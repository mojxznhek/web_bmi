@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-health-tips.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_health_tips.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_health_tips.inputs.health_category_id')
                    </h5>
                    <span
                        >{{ optional($healthTips->healthCategory)->cat_name ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_health_tips.inputs.url')</h5>
                    <a target="_blank" href="{{ $healthTips->url }}"
                        >{{ $healthTips->url ?? '-' }}</a
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_health_tips.inputs.description')</h5>
                    <span>{{ $healthTips->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_health_tips.inputs.content')</h5>
                    <span>{{ $healthTips->content ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_health_tips.inputs.source')</h5>
                    <span>{{ $healthTips->source ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-health-tips.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\HealthTips::class)
                <a
                    href="{{ route('all-health-tips.create') }}"
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
