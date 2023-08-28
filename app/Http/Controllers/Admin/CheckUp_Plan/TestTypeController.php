<?php

namespace App\Http\Controllers\Admin\CheckUp_Plan;

use App\Http\Controllers\Controller;
use App\Models\TestType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Auth;

class TestTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.checkup_plan.testtype');
    }
    public function list()
    {
        $data = TestType::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function (TestType $test) {
                if ($test->is_show == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Block" data-onstyle="success"
                    data-offstyle="danger" value="' . $test->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Block" data-onstyle="success"
                    data-offstyle="danger" value="' . $test->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (TestType $test) {

                // $edit_link = ' <button type="button" class="btn btn-primary btn-icon-text edit_testtype" value="' . $test->id . '"> <i class="fa fa-solid fa-pencil"></i></button>';

                // $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_testtype" value="' . $test->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $edit_link = ' <a type="button" class="btn btn-primary btn-icon-text edit_testtype" href="' . route('admin.test_type.edit', [$test->id]) . '"> <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_testtype"  href="' . route('admin.test_type.destroy', [$test->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['status', 'actions'])
            ->toJson();
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'test_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $test_type = new TestType();
        $test_type->test_name = $request->test_name;
        if ($request->is_show == "on") {
            $test_type->is_show = 1;
        } else {
            $test_type->is_show = 0;
        }
        if ($test_type->save()) {
            return response()->json(['success' => true, 'message' => 'Test type added Sucessfully.', 'data' => $test_type], 200);
        }
    }

    public function edit($id)
    {
        $test_type = TestType::findOrFail($id);
        return response()->json($test_type);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'edit_test_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $test_type = TestType::findOrFail($id);
        $test_type->test_name = $request->edit_test_name;
        // if ($request->is_show == "on") {
        //     $test_type->is_show = 1;
        // } else {
        //     $test_type->is_show = 0;
        // }
        if ($test_type->save()) {
            return response()->json(['success' => true, 'message' => 'Test type updated Sucessfully.', 'data' => $test_type], 200);
        }
    }

    public function status($id)
    {
        $test_type = TestType::findOrFail($id);
        $test_type->is_show = !$test_type->is_show;
        $test_type->save();
        return response()->json(['success' => true, 'message' => 'Test type status change sucessfully.', 'data' => []], 200);
    }

    public function destroy($id)
    {
        $test_type = TestType::findOrFail($id);
        if ($test_type->delete()) {
            return response()->json(['success' => true, 'message' => 'Test type has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
