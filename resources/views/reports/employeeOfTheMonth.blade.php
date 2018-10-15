@extends('layouts.app')

@section('title','| '.$employee->name . ' is the Employee of this month')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Please congratulate {{$employee->name}}, Employee of the month.</div>

                    <div class="card-body">
                        <p>Based on the attendance calculated from:
                            <strong>{{ date('M j, Y',strtotime( $dates['start_date'] )) }}</strong>,
                            To: <strong>{{ date('M j, Y',strtotime( $dates['end_date'] )) }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection