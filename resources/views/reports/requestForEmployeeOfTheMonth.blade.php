@extends('layouts.app')

@section('title','| Add attendance')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add attendance</div>

                    <div class="card-body">
                        <p>Please specify the start and the end of your working month</p>
                        {!! Form::open(array('route' => 'reports.employeeOfTheMonth' )) !!}

                        {{ Form::label('start_date','From Date:') }}
                        {{ Form::date('start_date', \Carbon\Carbon::now(), array('class' => 'form-control','required'=> 'required')) }}

                        <br/>

                        {{ Form::label('end_date','To Date:') }}
                        {{ Form::date('end_date', \Carbon\Carbon::now(), array('class' => 'form-control','required'=> 'required')) }}

                        <br/>

                        {{ Form::submit('Generate',['class'=>'btn btn-success']) }}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
