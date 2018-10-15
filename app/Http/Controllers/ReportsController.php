<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function requestPage(){
        //get all employees from the DB to use them in the drop down
        $employees = Employee::orderBy('name')->get();
        //return the view
        return view('reports.request')->withEmployees($employees);
    }

    public function generateReport(request $request){

        $employee = Employee::find($request->employee_id);
        $attendances = Attendance::where('employee_id',$request->employee_id)
            ->where('date','>=',$request->start_date)
            ->where('date','<=',$request->end_date)->orderby('date')->get();

        $dates = [
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
            ];
        return view('reports.report')->withEmployee($employee)->withAttendances($attendances)->withDates($dates);

    }

    public function requestForEmployeeOfTheMonth(){
        //get all employees from the DB to use them in the drop down
        //return the view
        return view('reports.requestForEmployeeOfTheMonth');
    }

    public function employeeOfTheMonth(request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        //get all employees
        $employees = Employee::all();
        //define the array for the values of the absolutes
        $employees_hours_difference = [];
            //for each employee
        foreach($employees as $employee){

            //get all attendances for each employee
            $attendances = Attendance::where('employee_id',$employee->id)
                ->where('date','>=',$start_date)
                ->where('date','<=',$end_date)->orderby('date')->get();

            //make average and store it
            $sum_hours = 0;
            $count_hours = 0;
            foreach ($attendances as $attendance) {
                $sum_hours += $attendance->hours;
                $count_hours += 1;
            }

            if($count_hours){
                $average = (float)$sum_hours/$count_hours;
                //get abs difference from 8 hrs
                $diffrence_from_ideal = Abs((float)(8 - $average));
                $employees_hours_difference[$employee->id] = $diffrence_from_ideal;
            }
        }

        //get the least value of abs.
        $winner_id = array_search(min($employees_hours_difference),$employees_hours_difference);

        //announce the winner :)
        $winner = Employee::find($winner_id);

        //return the view with winner data and range..

        return view('reports.employeeOfTheMonth')->withEmployee($winner)
        ->withStartDate($start_date)->withDates([
            'start_date'=> $start_date,
            'end_date' => $end_date
         ]);

    }

}
