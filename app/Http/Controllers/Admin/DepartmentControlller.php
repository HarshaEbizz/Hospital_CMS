<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Str;
class DepartmentControlller extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.department');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_name' => 'required|unique:departments',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $department = new Department();
        $department->department_name = Str::upper($request->department_name);
        if ($department->save()) {
            return response()->json(['success' => true, 'message' => 'Department Added sucessfully.'], 200);
        }
    }
    public function list()
    {
        $data = Department::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function (Department $department) {
                // $edit_link = ' <button type="button" class="btn btn-primary btn-icon-text edit_department" value="' . $department->id . '">
                // <i class="fa fa-solid fa-pencil"></i></button>';

                // $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_department" value="' . $department->id . '">
                // <i class="fa fa-solid fa-trash"></i></button>';

                $edit_link = ' <a class="btn btn-primary btn-icon-text edit_department" data-id="' . $department->id . '">
                <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_department"  href="' . route('admin.department.destroy', [$department->id]) . '">
                <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return response()->json($department);
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'edit_department_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $department = Department::findOrFail($id);
        $department->department_name = Str::upper($request->edit_department_name);
        if ($department->save()) {
            return response()->json(['success' => true, 'message' => 'Department Updated sucessfully.'], 200);
        }
    }
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        if ($department->delete()) {
            return response()->json(['success' => true, 'message' => 'Department has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
