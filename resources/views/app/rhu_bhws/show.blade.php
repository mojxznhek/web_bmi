@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('rhu-bhws.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.rural_health_unit_barangay_health_workers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.rural_health_unit_barangay_health_workers.inputs.completename')
                    </h5>
                    <span>{{ $rhuBhw->completename ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.rural_health_unit_barangay_health_workers.inputs.profession')
                    </h5>
                    <span>{{ $rhuBhw->profession ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.rural_health_unit_barangay_health_workers.inputs.license_no')
                    </h5>
                    <span>{{ $rhuBhw->license_no ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('rhu-bhws.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\RhuBhw::class)
                <a href="{{ route('rhu-bhws.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
