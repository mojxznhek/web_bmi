<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthCategory;
use App\Http\Requests\HealthCategoryStoreRequest;
use App\Http\Requests\HealthCategoryUpdateRequest;

class HealthCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', HealthCategory::class);

        $search = $request->get('search', '');

        $healthCategories = HealthCategory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.health_categories.index',
            compact('healthCategories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', HealthCategory::class);

        return view('app.health_categories.create');
    }

    /**
     * @param \App\Http\Requests\HealthCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthCategoryStoreRequest $request)
    {
        $this->authorize('create', HealthCategory::class);

        $validated = $request->validated();

        $healthCategory = HealthCategory::create($validated);

        return redirect()
            ->route('health-categories.edit', $healthCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HealthCategory $healthCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, HealthCategory $healthCategory)
    {
        $this->authorize('view', $healthCategory);

        return view('app.health_categories.show', compact('healthCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HealthCategory $healthCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, HealthCategory $healthCategory)
    {
        $this->authorize('update', $healthCategory);

        return view('app.health_categories.edit', compact('healthCategory'));
    }

    /**
     * @param \App\Http\Requests\HealthCategoryUpdateRequest $request
     * @param \App\Models\HealthCategory $healthCategory
     * @return \Illuminate\Http\Response
     */
    public function update(
        HealthCategoryUpdateRequest $request,
        HealthCategory $healthCategory
    ) {
        $this->authorize('update', $healthCategory);

        $validated = $request->validated();

        $healthCategory->update($validated);

        return redirect()
            ->route('health-categories.edit', $healthCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HealthCategory $healthCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HealthCategory $healthCategory)
    {
        $this->authorize('delete', $healthCategory);

        $healthCategory->delete();

        return redirect()
            ->route('health-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
