<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        //get all employees from the DB
        $employees = Employee::orderBy('name')->paginate(25);
        //return the view
        return view('employee.index')->withEmployees($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|min:9|max:20|unique:employees',
            'hire_date' => 'required',
        ));

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->mobile = $request->mobile;
        $employee->hire_date = $request->hire_date;;

        $employee->save();

        //flash message
        Session::flash('success','The new employee was saved successfully');

        //redirection
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        $attendances = Attendance::where('employee_id',$id)->orderby('date','desc')->get();
//        dd($attendances);
        return view('employee.show')->withEmployee($employee)->withAttendances($attendances);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit')
            ->withEmployee($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        $this->validate($request,array(
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|min:9|max:20|unique:employees,mobile,'. $employee->id . 'id',
            'hire_date' => 'required',
        ));

        $employee->name = $request->name;
        $employee->mobile = $request->mobile;
        $employee->hire_date = $request->hire_date;;

        $employee->save();

        //flash message
        Session::flash('success','The employee data were updated successfully');

        //redirection
        return redirect()->route('employee.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);

        //flash message
        Session::flash('success','The employee was deleted successfully');

        //redirect
        return redirect()->route('employee.index');
    }
}
