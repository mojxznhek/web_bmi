<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\RhuBhw;
use Illuminate\Http\Request;
use App\Models\ChildMedicalData;
use App\Http\Requests\ChildMedicalDataStoreRequest;
use App\Http\Requests\ChildMedicalDataUpdateRequest;

class ChildMedicalDataController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ChildMedicalData::class);

        $search = $request->get('search', '');

        $allChildMedicalData = ChildMedicalData::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_child_medical_data.index',
            compact('allChildMedicalData', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ChildMedicalData::class);

        $children = Child::pluck('completename', 'id');
        $rhuBhws = RhuBhw::pluck('completename', 'id');

        return view(
            'app.all_child_medical_data.create',
            compact('children', 'rhuBhws')
        );
    }

    /**
     * @param \App\Http\Requests\ChildMedicalDataStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildMedicalDataStoreRequest $request)
    {
        $this->authorize('create', ChildMedicalData::class);

        $validated = $request->validated();

        $childMedicalData = ChildMedicalData::create($validated);

        return redirect()
            ->route('all-child-medical-data.edit', $childMedicalData)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ChildMedicalData $childMedicalData
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ChildMedicalData $childMedicalData)
    {
        $this->authorize('view', $childMedicalData);

        return view(
            'app.all_child_medical_data.show',
            compact('childMedicalData')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ChildMedicalData $childMedicalData
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ChildMedicalData $childMedicalData)
    {
        $this->authorize('update', $childMedicalData);

        $children = Child::pluck('completename', 'id');
        $rhuBhws = RhuBhw::pluck('completename', 'id');

        return view(
            'app.all_child_medical_data.edit',
            compact('childMedicalData', 'children', 'rhuBhws')
        );
    }

    /**
     * @param \App\Http\Requests\ChildMedicalDataUpdateRequest $request
     * @param \App\Models\ChildMedicalData $childMedicalData
     * @return \Illuminate\Http\Response
     */
    public function update(
        ChildMedicalDataUpdateRequest $request,
        ChildMedicalData $childMedicalData
    ) {
        $this->authorize('update', $childMedicalData);

        $validated = $request->validated();

        $childMedicalData->update($validated);

        return redirect()
            ->route('all-child-medical-data.edit', $childMedicalData)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ChildMedicalData $childMedicalData
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        ChildMedicalData $childMedicalData
    ) {
        $this->authorize('delete', $childMedicalData);

        $childMedicalData->delete();

        return redirect()
            ->route('all-child-medical-data.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
