<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarioPhysician;
use App\Http\Requests\BarioPhysicianStoreRequest;
use App\Http\Requests\BarioPhysicianUpdateRequest;

class BarioPhysicianController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BarioPhysician::class);

        $search = $request->get('search', '');

        $barioPhysicians = BarioPhysician::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.bario_physicians.index',
            compact('barioPhysicians', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', BarioPhysician::class);

        return view('app.bario_physicians.create');
    }

    /**
     * @param \App\Http\Requests\BarioPhysicianStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarioPhysicianStoreRequest $request)
    {
        $this->authorize('create', BarioPhysician::class);

        $validated = $request->validated();

        $barioPhysician = BarioPhysician::create($validated);

        return redirect()
            ->route('bario-physicians.edit', $barioPhysician)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BarioPhysician $barioPhysician
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BarioPhysician $barioPhysician)
    {
        $this->authorize('view', $barioPhysician);

        return view('app.bario_physicians.show', compact('barioPhysician'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BarioPhysician $barioPhysician
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BarioPhysician $barioPhysician)
    {
        $this->authorize('update', $barioPhysician);

        return view('app.bario_physicians.edit', compact('barioPhysician'));
    }

    /**
     * @param \App\Http\Requests\BarioPhysicianUpdateRequest $request
     * @param \App\Models\BarioPhysician $barioPhysician
     * @return \Illuminate\Http\Response
     */
    public function update(
        BarioPhysicianUpdateRequest $request,
        BarioPhysician $barioPhysician
    ) {
        $this->authorize('update', $barioPhysician);

        $validated = $request->validated();

        $barioPhysician->update($validated);

        return redirect()
            ->route('bario-physicians.edit', $barioPhysician)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BarioPhysician $barioPhysician
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BarioPhysician $barioPhysician)
    {
        $this->authorize('delete', $barioPhysician);

        $barioPhysician->delete();

        return redirect()
            ->route('bario-physicians.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
