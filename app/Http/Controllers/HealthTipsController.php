<?php

namespace App\Http\Controllers;

use App\Models\HealthTips;
use Illuminate\Http\Request;
use App\Models\HealthCategory;
use App\Http\Requests\HealthTipsStoreRequest;
use App\Http\Requests\HealthTipsUpdateRequest;

class HealthTipsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', HealthTips::class);

        $search = $request->get('search', '');

        $allHealthTips = HealthTips::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_health_tips.index',
            compact('allHealthTips', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', HealthTips::class);

        $healthCategories = HealthCategory::pluck('cat_name', 'id');

        return view('app.all_health_tips.create', compact('healthCategories'));
    }

    /**
     * @param \App\Http\Requests\HealthTipsStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthTipsStoreRequest $request)
    {
        $this->authorize('create', HealthTips::class);

        $validated = $request->validated();

        $healthTips = HealthTips::create($validated);

        return redirect()
            ->route('all-health-tips.edit', $healthTips)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HealthTips $healthTips
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, HealthTips $healthTips)
    {
        $this->authorize('view', $healthTips);

        return view('app.all_health_tips.show', compact('healthTips'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HealthTips $healthTips
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, HealthTips $healthTips)
    {
        $this->authorize('update', $healthTips);

        $healthCategories = HealthCategory::pluck('cat_name', 'id');

        return view(
            'app.all_health_tips.edit',
            compact('healthTips', 'healthCategories')
        );
    }

    /**
     * @param \App\Http\Requests\HealthTipsUpdateRequest $request
     * @param \App\Models\HealthTips $healthTips
     * @return \Illuminate\Http\Response
     */
    public function update(
        HealthTipsUpdateRequest $request,
        HealthTips $healthTips
    ) {
        $this->authorize('update', $healthTips);

        $validated = $request->validated();

        $healthTips->update($validated);

        return redirect()
            ->route('all-health-tips.edit', $healthTips)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HealthTips $healthTips
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HealthTips $healthTips)
    {
        $this->authorize('delete', $healthTips);

        $healthTips->delete();

        return redirect()
            ->route('all-health-tips.index')
            ->withSuccess(__('crud.common.removed'));
    }
}