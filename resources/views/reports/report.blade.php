@extends('layouts.app')

@section('title','| '.$employee->name . ' Attendance Report')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">{{$employee->name}}, Attendance Report.</div>

                    <div class="card-body">
                        <p><strong>Name: </strong> {{$employee->name}}</p>
                        <p><strong>Mobile Number: </strong> {{$employee->mobile}}</p>
                        <a href="{{ route('employee.show',$employee->id) }}">Show employee Page</a>
                        <hr>
                        <h4>Employee Attendance</h4>
                        <p>From: <strong>{{ date('M j, Y',strtotime( $dates['start_date'] )) }}</strong>, To: <strong>{{ date('M j, Y',strtotime( $dates['end_date'] )) }}</strong></p>

                        <table class="table">
                            <thead>

                            <th>Date</th>
                            <th>Hours</th>
                            <th>Status</th>
                            <th>delete</th>
                            </thead>

                            <tbody>
                            @foreach($attendances as $attendance) {{--all attendance ascoiated to this employee--}}
                            <tr>
                                <td><a href="{{ route('attendance.show',$attendance->id) }}">{{ date('M j, Y',strtotime( $attendance->date )) }}</a></td>
                                <td>{{ $attendance->hours }} hours</td>
                                <td>{{ $attendance->status->title }}</td>

                                <td>
                                    {!! Form::open(['route'=>['attendance.destroy',$attendance->id], 'method' => 'DELETE']) !!}
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection