@extends('layouts.app')

@section('title','| All Employees')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">All Employees</div>

                    <div class="card-body">
                        <a href="{{ route('employee.create') }}" class="btn btn-outline-primary btn-lg">Add New Employee</a>

                        <a href="{{ route('attendance.create') }}" class="btn btn-outline-primary btn-lg">Add Attendance</a>

                        <a href="{{ route('reports.request') }}" class="btn btn-outline-primary btn-lg">Create Report</a>

                        <a href="{{ route('reports.employeeOfTheMonth') }}" class="btn btn-outline-primary btn-lg">The Employee of the Month</a>

                        <hr>

                        <table class="table">
                            <thead>

                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Hiring Date</th>
                            <th>delete</th>
                            <th>Edit</th>
                            </thead>

                            <tbody>
                            @foreach($employees as $employee){{--array of all employees--}}
                            <tr>
                                <td><a href="{{ route('employee.show',$employee->id) }}">{{ $employee->name }}</a></td>
                                <td><a href="{{ route('employee.show',$employee->id) }}">{{ $employee->mobile}}</a></td>
                                <td>{{ date('M j, Y',strtotime( $employee->hire_date )) }}</td>

                                <td>
                                    {!! Form::open(['route'=>['employee.destroy',$employee->id], 'method' => 'DELETE']) !!}
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    {!! Form::close() !!}

                                </td>
                                <td><a href="{{ route('employee.edit',$employee->id) }}" class="button btn btn-secondary btn-sm">
                                        edit
                                    </a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $employees->links()  !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection