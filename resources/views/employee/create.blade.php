@extends('layouts.app')

@section('title','| Add new Employee')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Employee</div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'employee.store' )) !!}

                        {{ Form::label('name','Name: ') }}
                        {{ Form::text('name',null,['class' => 'form-control','required'=> 'required']) }}

                        <br/>

                        {{ Form::label('mobile','Mobile Number: ') }}
                        {{ Form::text('mobile',null,['class' => 'form-control','required'=> 'required']) }}

                        <br/>

                        {{ Form::label('hire_date','Hiring Date:') }}
                        {{ Form::date('hire_date', \Carbon\Carbon::now(), array('class' => 'form-control','required'=> 'required')) }}

                        <br/>

                        {{ Form::submit('Save',['class'=>'btn btn-success']) }}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection