@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('rhu-bhws.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.rural_health_unit_barangay_health_workers.create_title')
            </h4>

            <x-form
                method="POST"
                action="{{ route('rhu-bhws.store') }}"
                class="mt-4"
            >
                @include('app.rhu_bhws.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('rhu-bhws.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.create')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
