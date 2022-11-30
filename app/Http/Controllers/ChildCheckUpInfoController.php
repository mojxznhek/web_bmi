<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;
use App\Models\BarioPhysician;
use App\Models\ChildCheckUpInfo;
use App\Http\Requests\ChildCheckUpInfoStoreRequest;
use App\Http\Requests\ChildCheckUpInfoUpdateRequest;

class ChildCheckUpInfoController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ChildCheckUpInfo::class);

        $search = $request->get('search', '');

        $childCheckUpInfos = ChildCheckUpInfo::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.child_check_up_infos.index',
            compact('childCheckUpInfos', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', ChildCheckUpInfo::class);

        $children = Child::pluck('completename', 'id');
        $barioPhysicians = BarioPhysician::pluck('completename', 'id');

        return view(
            'app.child_check_up_infos.create',
            compact('children', 'barioPhysicians')
        );
    }

    /**
     * @param \App\Http\Requests\ChildCheckUpInfoStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildCheckUpInfoStoreRequest $request)
    {
        $this->authorize('create', ChildCheckUpInfo::class);

        $validated = $request->validated();

        $childCheckUpInfo = ChildCheckUpInfo::create($validated);

        return redirect()
            ->route('child-check-up-infos.edit', $childCheckUpInfo)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ChildCheckUpInfo $childCheckUpInfo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ChildCheckUpInfo $childCheckUpInfo)
    {
        $this->authorize('view', $childCheckUpInfo);

        return view(
            'app.child_check_up_infos.show',
            compact('childCheckUpInfo')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ChildCheckUpInfo $childCheckUpInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ChildCheckUpInfo $childCheckUpInfo)
    {
        $this->authorize('update', $childCheckUpInfo);

        $children = Child::pluck('completename', 'id');
        $barioPhysicians = BarioPhysician::pluck('completename', 'id');

        return view(
            'app.child_check_up_infos.edit',
            compact('childCheckUpInfo', 'children', 'barioPhysicians')
        );
    }

    /**
     * @param \App\Http\Requests\ChildCheckUpInfoUpdateRequest $request
     * @param \App\Models\ChildCheckUpInfo $childCheckUpInfo
     * @return \Illuminate\Http\Response
     */
    public function update(
        ChildCheckUpInfoUpdateRequest $request,
        ChildCheckUpInfo $childCheckUpInfo
    ) {
        $this->authorize('update', $childCheckUpInfo);

        $validated = $request->validated();

        $childCheckUpInfo->update($validated);

        return redirect()
            ->route('child-check-up-infos.edit', $childCheckUpInfo)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ChildCheckUpInfo $childCheckUpInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        ChildCheckUpInfo $childCheckUpInfo
    ) {
        $this->authorize('delete', $childCheckUpInfo);

        $childCheckUpInfo->delete();

        return redirect()
            ->route('child-check-up-infos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
