@extends('layouts.childlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - {{ __('You are logged in!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <h1>Displaying your Medical Record:</h1>
                    <h2>{{ Auth::user()->completename }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div style="width: 80%; height:25%;  margin: 0 auto;">
                    {!! $childPieWeight->container() !!}
                </div>
            </div>
            {!! $childPieWeight->script() !!}
        </div>

        <div class="col-md-6">
            <div class="card">
                <div style="width: 80%; height:25%;  margin: 0 auto;">
                    {!! $childPieRemarks->container() !!}
                </div>
            </div>
            {!! $childPieRemarks->script() !!}
        </div>
        @if(!empty($healthTips))
        @foreach ($healthTips as $tips)
        <div class="col-md-3 lg-3 sm-3 mb-4">
            <div class="card">
                <div class="card-header"><b>Watch Videos related to: </b>{{ $tips->content }} <b> Weight</b></div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="420" height="315" src="{{$tips->url}}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        @endforeach
        @endif







    </div>
</div>


</div>
@endsection