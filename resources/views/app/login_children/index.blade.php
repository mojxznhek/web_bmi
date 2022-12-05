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



        
        <div class="row bg-gray-700 pt-4 mb-4">
        <!-- Display MEdical Record -->
            @foreach($medrecord as $key => $data)
            @if ($medrecord->count() > 0 )
            <div class="col-md-6 lg-6 sm-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> Date of Checkup:  <span>{{ $data->checkup_followup->format('M d,Y')}}</span></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               <b class="h3"> Weight:  {{ $data->weight}}</b> Kg <br>
                               <b class="h3"> Height: {{ $data->height}} </b> cm<br>
                               <b class="h3"> BMI: {{ $data->weight / ($data->height/$data->height * 10000)}}</b> <br>
                               <b class="h3"> Remarks: {{ $data->remarks}}</b>  <br>
                               <b class="h3"> Diagnosis: {{ $data->diagnosis}}</b> <br>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div> <!-- ./col -->
            @endif
            @endforeach
            </div>

                 @if(!empty($healthObese))
                @foreach ($healthObese as $tips)
                    <div class="col-md-3 lg-3 sm-3 mb-4">
                        <div class="card">
                            <div class="card-header"><b>Watch Videos  </b></div>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="420" height="315" src="{{$tips}}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
    </div>
</div>
@endsection