<?php

namespace App\Http\Controllers\Backend;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $department = Department::where('name','like', '%' . $request->search . '%')->get();
        }else{
            $department = Department::all();
        }
        return view('department.index',compact('department'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(DepartmentStoreRequest $request)
    {
        Department::create([
            'name' => $request->name
        ]);
        return redirect()->route('departments.index')->with('message','Department Added Successfully!');
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('department.edit',compact('department'));
    }

    
    public function update(DepartmentUpdateRequest $request, $id)
    {
        Department::where('id',$id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('departments.index')->with('message','Department Updated Successfully!');
    }

   
    public function destroy($id)
    {
        Department::where('id',$id)->delete();
        return redirect()->route('departments.index')->with('message','Department Deleted Successfully!');
    }
}