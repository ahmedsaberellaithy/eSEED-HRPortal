@extends('layouts.app')

@section('title','| Edit Employee Data')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Employee Data</div>

                    <div class="card-body">
                        {!! Form::model($employee,
                        ['route'=>['employee.update',$employee->id],
                        'method' => 'PUT',
                        'data-parsley-validate'=>'',
                        'files' => true
                        ]) !!}

                        {{ Form::label('name','Name: ') }}
                        {{ Form::text('name',$employee->name,['class' => 'form-control','required'=> 'required']) }}

                        <br/>

                        {{ Form::label('mobile','Mobile Number: ') }}
                        {{ Form::text('mobile',$employee->mobile,['class' => 'form-control','required'=> 'required']) }}

                        <br/>

                        {{ Form::label('hire_date','Hiring Date:') }}
                        {{ Form::date('hire_date', \Carbon\Carbon::parse($employee->hire_date), array('class' => 'form-control','required'=> 'required')) }}

                        <hr/>
                        <div class="col-sm-6">
                            {!! Html::linkRoute('employee.show','Cancel',array($employee->id),array('class'=> 'btn-danger btn center-block')) !!}
                        </div>

                        <br/>

                        <div class="col-sm-6">
                            {{ Form::submit('Save Changes',array('class'=> 'btn-success btn center-block')) }}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection