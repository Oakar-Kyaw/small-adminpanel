<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee\Employee;
use App\Models\Company\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('id')->paginate(5);
        return view('employees.employee',compact('employees'));
    }
    
    //go to add employee
    public function add(){
        $companies = Company::orderBy("id")->get();
        return view('employees.addemployee',compact("companies"));

    }
     /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //validate function
        $validator = Validator::make($request->all(),[
            'employee_name' => 'required',
            'employee_email' => 'required',
            'employee_phone' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $employee = new Employee;
        $employee->fullname = $request->employee_name;
        $employee->email = $request->employee_email;
        $employee->company_id= $request->employee_company;
        $employee->phone = $request->employee_phone;
        $employee->save();
        return redirect()->route('employee.index')->with("info","Employee is successfully added"); 
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $employee = Employee::find($id);
        $companies = Company::orderBy('id')->get();
        return view("employees.editemployee",compact("employee","companies"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);
        $employee->fullname = $request->employee_name;
        $employee->email = $request->employee_email;
        $employee->company_id= $request->employee_company;
        $employee->phone = $request->employee_phone;
        $employee->save();
        return redirect()->route('employee.index')->with("info","Employee is successfully edited"); 
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $employee = Employee::find($id);
       $employee->delete();
       return redirect()->route('employee.index')->with("info","Successfully Deleted");
    }
}
