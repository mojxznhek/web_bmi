<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ChildStoreRequest;
use App\Http\Requests\ChildUpdateRequest;
use App\Models\ChildParent;

class ChildController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $this->authorize('view-any', Child::class);

        $search = $request->get('search', '');

        $children = Child::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.children.index', compact('children', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Child::class);
        $allparents = ChildParent::select('completename')->get();
        // dd($allparents);
        // dd($allparents);
        return view('app.children.create', compact('allparents'));
    }

    /**
     * @param \App\Http\Requests\ChildStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildStoreRequest $request)
    {
        $this->authorize('create', Child::class);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        $child = Child::create($validated);

        return redirect()
            ->route('children.edit', $child)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Child $child
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Child $child)
    {
        $this->authorize('view', $child);

        return view('app.children.show', compact('child'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Child $child
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Child $child)
    {
        $this->authorize('update', $child);
        $this->authorize('create', Child::class);
        $allparents = ChildParent::select('completename')->get();
        return view('app.children.edit', compact('child', 'allparents'));
    }

    /**
     * @param \App\Http\Requests\ChildUpdateRequest $request
     * @param \App\Models\Child $child
     * @return \Illuminate\Http\Response
     */
    public function update(ChildUpdateRequest $request, Child $child)
    {
        $this->authorize('update', $child);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            if ($child->photo) {
                Storage::delete($child->photo);
            }

            $validated['photo'] = $request->file('photo')->store('public');
        }

        $child->update($validated);

        return redirect()
            ->route('children.edit', $child)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Child $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Child $child)
    {
        $this->authorize('delete', $child);

        if ($child->photo) {
            Storage::delete($child->photo);
        }

        $child->delete();

        return redirect()
            ->route('children.index')
            ->withSuccess(__('crud.common.removed'));
    }
}