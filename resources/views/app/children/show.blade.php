@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('children.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.children.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.children.inputs.photo')</h5>
                    <x-partials.thumbnail
                        src="{{ $child->photo ? \Storage::url($child->photo) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.children.inputs.completename')</h5>
                    <span>{{ $child->completename ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.children.inputs.dob')</h5>
                    <span>{{ $child->dob ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.children.inputs.gender')</h5>
                    <span>{{ $child->gender ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.children.inputs.mothersName')</h5>
                    <span>{{ $child->mothersName ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.children.inputs.phone')</h5>
                    <span>{{ $child->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.children.inputs.address')</h5>
                    <span>{{ $child->address ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('children.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Child::class)
                <a href="{{ route('children.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
