@extends('layouts.app')

@section('title','| '.$employee->name . ' Page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">{{$employee->name}} Page</div>

                    <div class="card-body">
                        <p><strong>Name: </strong> {{$employee->name}}</p>
                        <p><strong>Mobile Number: </strong> {{$employee->mobile}}</p>
                        <p><strong>Hired at: </strong> {{ date('M j, Y',strtotime( $employee->hire_date )) }}</p>

                        <hr>
                        {!! Form::open(['route'=>['employee.destroy',$employee->id], 'method' => 'DELETE']) !!}
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        {!! Form::close() !!}
                        <br>
                        <a href="{{ route('employee.edit',$employee->id) }}" class="button btn btn-secondary btn-sm">Edit</a>
                        <hr>

                        <h4>All Employee Attendance</h4>

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