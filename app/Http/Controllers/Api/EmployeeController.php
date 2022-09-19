<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
       
        $employee = Employee::join('departments','departments.id','employees.department_id')
            ->get(['employees.*','departments.name as department']);
        $department = Department::all();
        return view('employees.index',compact(['employee','department']));
    }

    public function create()
    {
        $country = Country::orderBy('name','asc')->get();
        $department = Department::orderBy('name','asc')->get();
        return view('employees.create',compact(['country','department']));
    }

    public function store(EmployeeStoreRequest $request)
    {
        Employee::create([
           'first_name' => $request->first_name,
           'middle_name' => $request->middle_name,
           'last_name' => $request->last_name,
           'address' => $request->address,
           'country_id' => $request->country_name,
           'state_id' => $request->state_name,
           'city_id' => $request->city_name,
           'department_id' => $request->department,
           'birth_date' => $request->birthday,
           'date_hired' => $request->date_hired,
           'zipcode' => $request->zipcode,
        ]);

        return redirect()->route('employees.index')->with('message','Employee Added!');
    }

    public function search_employees(Request $request)
    {
        if($request->val == ''){
            $employee = Employee::join('departments','departments.id','employees.department_id')
            ->get(['employees.*','departments.name as department']);
        }else{
            $employee = Employee::join('departments','departments.id','employees.department_id')
            ->where('first_name','like', '%' . $request->val . '%')
            ->orWhere('middle_name','like', '%' . $request->val . '%')
            ->orWhere('last_name','like', '%' . $request->val . '%')
            ->get(['employees.*','departments.name as department']);
        }

        return response()->json($employee);
        
    }

    public function search_by_department(Request $request)
    {
        if($request->val == ''){
            $employee = Employee::join('departments','departments.id','employees.department_id')
            ->get(['employees.*','departments.name as department']);
        }else{
            $employee = Employee::join('departments','departments.id','employees.department_id')
            ->where('department_id',$request->val)
            ->get(['employees.*','departments.name as department']);
        }
        return response()->json($employee);
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $country = Country::orderBy('name','asc')->get();
        $state = State::orderBy('name','asc')->where('country_id',$employee->country_id)->get();
        $city = City::orderBy('name','asc')->where('state_id',$employee->state_id)->get();
        $department = Department::orderBy('name','asc')->get();
        return view('employees.edit',compact(['country','department','employee','state','city']));
    }

    public function update(EmployeeUpdateRequest $request, $id)
    {
        Employee::where('id',$id)->update([
           'first_name' => $request->first_name,
           'middle_name' => $request->middle_name,
           'last_name' => $request->last_name,
           'address' => $request->address,
           'country_id' => $request->country_name,
           'state_id' => $request->state_name,
           'city_id' => $request->city_name,
           'department_id' => $request->department,
           'birth_date' => $request->birthday,
           'date_hired' => $request->date_hired,
           'zipcode' => $request->zipcode,
        ]);

        return redirect()->route('employees.index')->with('message','Employee Updated!');
    }

    public function destroy($id)
    {
        Employee::where('id',$id)->delete();

        return redirect()->route('employees.index')->with('message','Employee Deleted!');
    }
}
