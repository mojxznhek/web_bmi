<?php

namespace App\Http\Controllers;

use App\Models\RhuBhw;
use Illuminate\Http\Request;
use App\Http\Requests\RhuBhwStoreRequest;
use App\Http\Requests\RhuBhwUpdateRequest;

class RhuBhwController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', RhuBhw::class);

        $search = $request->get('search', '');

        $rhuBhws = RhuBhw::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.rhu_bhws.index', compact('rhuBhws', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', RhuBhw::class);

        return view('app.rhu_bhws.create');
    }

    /**
     * @param \App\Http\Requests\RhuBhwStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RhuBhwStoreRequest $request)
    {
        $this->authorize('create', RhuBhw::class);

        $validated = $request->validated();

        $rhuBhw = RhuBhw::create($validated);

        return redirect()
            ->route('rhu-bhws.edit', $rhuBhw)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RhuBhw $rhuBhw
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RhuBhw $rhuBhw)
    {
        $this->authorize('view', $rhuBhw);

        return view('app.rhu_bhws.show', compact('rhuBhw'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RhuBhw $rhuBhw
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RhuBhw $rhuBhw)
    {
        $this->authorize('update', $rhuBhw);

        return view('app.rhu_bhws.edit', compact('rhuBhw'));
    }

    /**
     * @param \App\Http\Requests\RhuBhwUpdateRequest $request
     * @param \App\Models\RhuBhw $rhuBhw
     * @return \Illuminate\Http\Response
     */
    public function update(RhuBhwUpdateRequest $request, RhuBhw $rhuBhw)
    {
        $this->authorize('update', $rhuBhw);

        $validated = $request->validated();

        $rhuBhw->update($validated);

        return redirect()
            ->route('rhu-bhws.edit', $rhuBhw)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RhuBhw $rhuBhw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RhuBhw $rhuBhw)
    {
        $this->authorize('delete', $rhuBhw);

        $rhuBhw->delete();

        return redirect()
            ->route('rhu-bhws.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
