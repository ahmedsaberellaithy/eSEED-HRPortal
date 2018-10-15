<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        //
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $statuses = Status::all();
        return view('attendance.create')->withStatuses($statuses)->withEmployees($employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status_title = Status::find($request->status_id)->title;
        //validate
        $this->validate($request,array(
            'employee_id' => 'required|integer',
            'status_id' => 'required|integer',
            'date' => 'required',
            'hours' => ($status_title == 'present')?'required|min:0|max:24':'', //if status is only present validate this part.
        ));

        //create
        $attendance = new Attendance;
        //save
        $attendance->employee_id = $request->employee_id;
        $attendance->status_id = $request->status_id;
        $attendance->date = $request->date;
        if(($status_title == 'present'))
            $attendance->hours = $request->hours;

        $attendance->save();
        //flash message
        Session::flash('success','Attendance Saved');
        //redirect
        return redirect()->route('employee.show',$attendance->employee_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = Attendance::find($id);
        return view('attendance.show')->withAttendance($attendance);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
//    public function edit(Attendance $attendance)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, Attendance $attendance)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //save the employee id
        $employee_id = Attendance::find($id)->employee_id;
        //destroy the attendance
        Attendance::destroy($id);
        //flash message
        Session::flash('success','The attendance was deleted successfully');
        //redirect
        return redirect()->route('employee.show',$employee_id);

    }
}
