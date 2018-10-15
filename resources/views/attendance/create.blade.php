@extends('layouts.app')

@section('title','| Add attendance')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add attendance</div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'attendance.store' )) !!}

                        <br/>

                        {{ Form::label('employee_id','Select Employee:') }}
                        <select name="employee_id" class = 'form-control' required = 'required'>
                            @foreach($employees as $employee)
                                <option value={{ $employee->id }}> {{$employee->name}}</option>
                            @endforeach
                        </select>
                        <br/>

                        {{ Form::label('status_id','Select Status:') }}
                        <select name="status_id" class = 'form-control' required = 'required'>
                            @foreach($statuses as $status)
                                <option value={{ $status->id }}> {{$status->title}}</option>
                            @endforeach
                        </select>
                        <br/>

                        {{ Form::label('hours','Working Hours:') }}
                        {{ Form::number('hours',null, array('class' => 'form-control')) }}

                        <br/>

                        {{ Form::label('date','Date:') }}
                        {{ Form::date('date', \Carbon\Carbon::now(), array('class' => 'form-control','required'=> 'required')) }}

                        <br/>

                        {{ Form::submit('Save',['class'=>'btn btn-success']) }}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
