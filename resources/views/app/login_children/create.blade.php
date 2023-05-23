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
      <a href="{{route('parent-home')}}">Back to Home</a>

      <!-- Display MEdical Record -->
      <div class="card">
          <div class="card-body">
              <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title">
                          <span>Add another Child</span>
                      </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <form method="post" action="{{route('addchild.store')}}">
                          <x-inputs.group class="col-sm-12">
                              <x-inputs.text name="completename" label="Childs Complete Name" maxlength="50"
                                  placeholder="Child's Complete Name" required></x-inputs.text>
                          </x-inputs.group>

                          <x-inputs.group class="col-lg-12">
                              <x-inputs.date name="dob" label="Date Of Birth" max="255" required>
                              </x-inputs.date>
                          </x-inputs.group>

                          <x-inputs.group class="col-lg-12">
                              <x-inputs.select name="gender" label="Gender">
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                              </x-inputs.select>
                          </x-inputs.group>
                          <button class="btn btn-primary">Save</button>
                      </form>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">

                  </div>
                  <!-- /.card-footer -->
              </div>
              <!-- /.card -->
          </div>
      </div>
  </div>
  @endsection