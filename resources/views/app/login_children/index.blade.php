@extends('layouts.childlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - {{ __('You are logged in!')  }}
                    {{ Auth::user()->mothersName }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- <h1>Displaying your Medical Record:</h1>
                    <h2>{{ Auth::user()->completename }}</h2> -->
                </div>
            </div>
        </div>

        <!-- <div class="col-md-6">
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
        </div> -->
    </div>
    <a href="{{route('addchild.create')}}" class="btn btn-primary my-4">Add Another Child</a>
    <!-- my kids data -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-lg-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Kids Data</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Complete Name</th>
                                        <th>Date of Birth</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allrecords as $r)
                                    <tr>
                                        <td>{{$r->completename}}</td>
                                        <td>{{$r->dob->format('Y-m-d')}}</td>
                                        <td>{{$r->gender}}</td>
                                        <td>
                                            <a href="{{ route('view-individual', $r->id) }}">
                                                <button type="button" class="btn btn-light">
                                                    <i class="icon ion-md-eye"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8">
                                            @lang('crud.common.no_items_found')
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div> -->
                    </div>

                    <!-- end of table -->




                </div>
                @endsection