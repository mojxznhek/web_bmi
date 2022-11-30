@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a
                    href="{{ route('all-child-medical-data.index') }}"
                    class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.child_check_up_infos.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.child_id')</h5>
                    <span
                        >{{ optional($childMedicalData->child)->completename ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.weight')</h5>
                    <span>{{ $childMedicalData->weight ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.height')</h5>
                    <span>{{ $childMedicalData->height ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.bmi')</h5>
                    <span>{{ $childMedicalData->bmi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.remarks')</h5>
                    <span>{{ $childMedicalData->remarks ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.diagnosis')</h5>
                    <span>{{ $childMedicalData->diagnosis ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.child_check_up_infos.inputs.rhuBhw_id')</h5>
                    <span
                        >{{ optional($childMedicalData->rhuBhw)->completename ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.child_check_up_infos.inputs.checkup_followup')
                    </h5>
                    <span
                        >{{ $childMedicalData->checkup_followup ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-child-medical-data.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ChildMedicalData::class)
                <a
                    href="{{ route('all-child-medical-data.create') }}"
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
