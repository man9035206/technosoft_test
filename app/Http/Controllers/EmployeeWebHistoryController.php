<?php

namespace App\Http\Controllers;

use App\EmployeeWebHistory;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeWebHistoryResource;

class EmployeeWebHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees_web_histories= EmployeeWebHistory::all();
        return EmployeeWebHistoryResource::collection($employees_web_histories);
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
            'url' => 'required|max:255',
            'ip_address'  => 'required|max:255'
        ));
        $emp = new EmployeeWebHistory;
        $emp->ip_address = $request->ip_address;
        $emp->url = $request->url;
        $emp->date = $request->date;
        $emp->save();
        return response()->json(["message" => "Employee web history record created successfully!!"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeWebHistory  $employeeWebHistory
     * @return \Illuminate\Http\Response
     */
    public function show($ip_address)
    {
        $employees_web_history = EmployeeWebHistory::where('ip_address',$ip_address)->get();
        return EmployeeWebHistoryResource::collection($employees_web_history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeWebHistory  $employeeWebHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeWebHistory $employeeWebHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeWebHistory  $employeeWebHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeWebHistory $employeeWebHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeWebHistory  $employeeWebHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy($ip_address)
    {
        $employee = Employee::where('ip_address' , '=', $ip_address)->first();
        if ($employee) {
            $employee->delete();
           return response()->json(["message" => "Employee web history deleted successfully!!"], 200);
        }else{
           return response()->json(["message" => "Record not found"], 404);
        }
    }
}
