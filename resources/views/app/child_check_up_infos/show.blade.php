@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('child-check-up-infos.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.child_check_up_infos.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.child_id')</h5>
                    <span
                        >{{ optional($childCheckUpInfo->child)->completename ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.weight')</h5>
                    <span>{{ $childCheckUpInfo->weight ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.height')</h5>
                    <span>{{ $childCheckUpInfo->height ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.bmi')</h5>
                    <span>{{ $childCheckUpInfo->bmi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.remarks')</h5>
                    <span>{{ $childCheckUpInfo->remarks ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.diagnosis')</h5>
                    <span>{{ $childCheckUpInfo->diagnosis ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.child_check_up_infos.inputs.bario_physician_id')
                    </h5>
                    <span
                        >{{
                        optional($childCheckUpInfo->barioPhysician)->completename
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.child_check_up_infos.inputs.checkup_followup')
                    </h5>
                    <span
                        >{{ $childCheckUpInfo->checkup_followup ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('child-check-up-infos.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ChildCheckUpInfo::class)
                <a
                    href="{{ route('child-check-up-infos.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
