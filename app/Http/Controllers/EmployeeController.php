<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $employees = Employee::all();
        return EmployeeResource::collection($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'emp_id' => 'required|max:255',
            'emp_name' => 'required|max:255',
            'ip_address'  => 'required|max:255'
        ));
        $emp = new Employee;
        $emp->emp_id = $request->emp_id;
        $emp->emp_name = $request->emp_name;
        $emp->ip_address = $request->ip_address;
        $emp->save();
        return response()->json(["message" => "Employee record created successfully!!"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($ip_address)
    {
        $employees = Employee::where('ip_address',$ip_address)->get();
        return EmployeeResource::collection($employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($ip_address)
    {
        $employee = Employee::where('ip_address' , '=', $ip_address)->first();
        if ($employee) {
            $employee->delete();
           return response()->json(["message" => "Employee deleted successfully!!"], 200);
        }else{
           return response()->json(["message" => "Record not found"], 404);
        }
    }
}
