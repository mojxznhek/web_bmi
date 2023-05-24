  @extends('layouts.childlayout')

  @section('content')
  <div class="container">
      <div class="row stify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div lass="card-header">{{ __('Dashboard') }} - {{ __('You are logged in!')  }}
                      {{ Auth::user()->mothersName }}</div>
                  <div class="card-body">
                      @if (session('status'))
                      <iv class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </iv>
                      @endif
                      <!-- <h1>Displaying your Medical Record:</h1>
                     <h2>{{ Auth::user()->completename }}</h2> -->
                  </div>
              </div>
          </div>
      </div>
      <a href="{{route('parent-home')}}" class="btn btn-warning my-2">Back to Home</a>
      <div class="col-lg-12">
          <div class="card">
              <div style="width: 80%; height:25%;  margin: 0 auto;">
                  {!! $childPieWeight->container() !!}
              </div>
          </div>
          {!! $childPieWeight->script() !!}
      </div>

      <div class="col-lg-12">
          <div class="card">
              <div style="width: 80%; height:25%;  margin: 0 auto;">
                  {!! $childPieRemarks->container() !!}
              </div>
          </div>
          {!! $childPieRemarks->script() !!}
      </div>
      <!-- Display MEdical Record -->
      @foreach($medrecord as $r)
      <div class="card">
          <div class="card-body">
              <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title"> Date of Checkup:
                          <span>{{ $r->checkup_followup->format('M d,Y')}}</span>
                      </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <b class="h3"> Weight: {{ $r->weight}}</b> Kg <br>
                      <b class="h3"> Height: {{ $r->height}} </b> cm<br>
                      <b class="h3"> BMI:
                          {{ $r->weight / ($r->height/$r->height * 10000)}}</b> <br>
                      <b class="h3"> Remarks: {{ $r->remarks}}</b> <br>
                      <b class="h3"> Suggestions: {{ $r->diagnosis}}</b> <br>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">

                  </div>
                  <!-- /.card-footer -->
              </div>
              <!-- /.card -->
          </div>
      </div>
      @endforeach
  </div>

  @if(!empty($healthObese))
  @foreach ($healthObese as $tips)
  <div class="col-md-6 lg-6 sm-6 mb-4">
      <div class="card">
          <div class="card-header"><b>Watch Videos</b></div>
          <div class="embed-responsive embed-responsive-16by9">
              <iframe width="420" height="315" src="{{$tips}}" frameborder="0" allowfullscreen></iframe>
          </div>
      </div>
  </div>
  @endforeach
  @endif
  @endsection