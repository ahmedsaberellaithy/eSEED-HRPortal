@extends('layouts.app')

@section('title','| Request a report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Request a report</div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'reports.generate' )) !!}

                        <br/>

                        {{ Form::label('employee_id','Select Employee:') }}
                        <select name="employee_id" class = 'form-control' required = 'required'>
                            @foreach($employees as $employee)
                                <option value={{ $employee->id }}> {{$employee->name}}</option>
                            @endforeach
                        </select>

                        <br/>

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
