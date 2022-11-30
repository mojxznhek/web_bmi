@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($medrecord as $key => $data)
        @if ($medrecord->count() > 0 )
        <div class="col col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Medical Record</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            Date of Checkup:<span>{{ $data->checkup_followup}}</span><br>
                            Weight:<span>{{ $data->weight}}</span> <br>
                            Height:<span>{{ $data->height}}</span> <br>
                            BMI:<span>{{ $data->weight / ($data->height/$data->height * 10000)}}</span> <br>
                            Remarks:<span>{{ $data->remarks}}</span> <br>
                            Diagnosis:<span>{{ $data->diagnosis}}</span> <br>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            --Nothing Follows--
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->

                    <div class="mt-4">
                        <a href="{{ route('children.index') }}" class="btn btn-light">
                            <i class="icon ion-md-return-left"></i>
                            @lang('crud.common.back')
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- ./col -->
        @endif

        @endforeach
    </div> <!-- ./row -->

    <div class="row">
        <div class="col col-12">
            <div class="card ">
                <div class="card-header bg-info">
                    <h3 class="card-title">BMI Information</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <img src="{{url('img/bmi_chart.jpg') }}" class="rounded mx-auto d-block w-75 h-25"><br>
                    <span>https://aljism-arabic.blogspot.com/2017/03/bmi-chart-in-kg-and-cm-for-child.html</span>
                    <p>Body mass index (BMI) is a person’s weight in kilograms divided by the square of height in
                        meters. It is an inexpensive and easy way to screen for weight categories that may lead to
                        health problems. For children and teens, BMI is age- and sex-specific and is often referred to
                        as BMI-for-age.
                        Regardless of the current BMI-for-age category, help your child or teen develop healthy weight
                        habits and talk with your doctor or other healthcare provider as part of ongoing tracking of
                        BMI-for-age. If your child has significant weight loss or gain, he or she should be referred to
                        and guided by a doctor or other healthcare provider.
                        Tracking growth patterns over time can help you make sure your child is achieving or maintaining
                        a healthy weight. A single BMI-for-age calculation is not enough to evaluate long-term weight
                        status because your child’s height and weight will change as they grow. With individuals, health
                        care providers should consider BMI along with other factors such as family history, blood
                        pressure, blood sugar levels, and eating patterns and physical activity level.</p>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <span>https://www.cdc.gov/healthyweight/assessing/bmi/childrens_bmi/about_childrens_bmi.html</span>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>

</div>
@endsection