@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Child::class)
                <a
                    href="{{ route('children.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.children.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.children.inputs.photo')
                            </th>
                            <th class="text-left">
                                @lang('crud.children.inputs.completename')
                            </th>
                            <th class="text-left">
                                @lang('crud.children.inputs.dob')
                            </th>
                            <th class="text-left">
                                @lang('crud.children.inputs.gender')
                            </th>
                            <th class="text-left">
                                @lang('crud.children.inputs.mothersName')
                            </th>
                            <th class="text-right">
                                @lang('crud.children.inputs.phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.children.inputs.address')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($children as $child)
                        <tr>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $child->photo ? \Storage::url($child->photo) : '' }}"
                                />
                            </td>
                            <td>{{ $child->completename ?? '-' }}</td>
                            <td>{{ $child->dob ?? '-' }}</td>
                            <td>{{ $child->gender ?? '-' }}</td>
                            <td>{{ $child->mothersName ?? '-' }}</td>
                            <td>{{ $child->phone ?? '-' }}</td>
                            <td>{{ $child->address ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $child)
                                    <a
                                        href="{{ route('children.edit', $child) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    
                                    @endcan 
                                    
                                    @can('view', $child)
                                    <a
                                        href="{{ route('view-medical.show', $child) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-stats"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $child)
                                    <a
                                        href="{{ route('children.show', $child) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $child)
                                    <form
                                        action="{{ route('children.destroy', $child) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">{!! $children->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
