@extends('layouts.app')

@section('title','| Attendance for: '.$attendance->employee->name )

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$attendance->employee->name}} Attendance</div>

                    <div class="card-body">
                        <p><strong>Name: </strong> {{$attendance->employee->name}}</p>
                        <p><strong>Date: </strong> {{ date('M j, Y',strtotime( $attendance->date )) }}</p>
                        <p><strong>Status: </strong> {{$attendance->status->title}}</p>
                        <p><strong>Total Hours: </strong> {{$attendance->hours}} hours</p>

                        <hr>
                        {!! Form::open(['route'=>['attendance.destroy',$attendance->id], 'method' => 'DELETE']) !!}
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        {!! Form::close() !!}

                        <hr>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection