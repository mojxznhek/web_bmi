@extends('layouts.loginlayout')

@section('content')
<div class="hold-transition login-page">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-primary">{{ __('Child Registration Form') }}</div>
            <div class="card-body">
                <div class="card-body">
                    <x-form method="POST" action="{{ route('child-register') }}" has-files class="mt-4">
                        @include('app.login_children.form-inputs')

                        <button type="submit" class="btn btn-primary float-right">
                            <i class="icon ion-md-save"></i>
                            @lang('Register')
                        </button>
                </div>
                </x-form>
            </div>
        </div>
        @endsection