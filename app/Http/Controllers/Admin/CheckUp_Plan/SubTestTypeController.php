<?php

namespace App\Http\Controllers\Admin\CheckUp_Plan;

use App\Http\Controllers\Controller;
use App\Models\SubTestType;
use App\Models\TestType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Auth;

class SubTestTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $this->data['test_type'] = TestType::get();
        return view('admin.pages.checkup_plan.subtesttype')->with($this->data);
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
        $sub_test = new SubTestType();
        $sub_test->test_id = $request->test_type;
        $sub_test->test_name = $request->test_name;
        if ($request->is_show == "on") {
            $sub_test->is_show = 1;
        } else {
            $sub_test->is_show = 0;
        }
        if ($sub_test->save()) {
            return response()->json(['success' => true, 'message' => 'Sub Test type added Sucessfully.', 'data' => $sub_test], 200);
        }
    }
    public function list()
    {
        $data = SubTestType::with('TestType')->get();
        // dd($data);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('type', function (SubTestType $test) {
                return $test->TestType->test_name;
            })
            ->addColumn('status', function (SubTestType $test) {
                if ($test->is_show == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $test->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $test->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (SubTestType $test) {

                // $edit_link = ' <button type="button" class="btn btn-primary btn-icon-text edit_subtype" value="' . $test->id . '"> <i class="fa fa-solid fa-pencil"></i></button>';

                // $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_subtype" value="' . $test->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $edit_link = ' <a type="button" class="btn btn-primary btn-icon-text edit_subtype" href="' . route('admin.sub_test_type.edit', [$test->id]) . '"> <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_subtype"  href="' . route('admin.sub_test_type.destroy', [$test->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['type','status', 'actions'])
            ->toJson();
    }
    public function edit($id)
    {
        $sub_test = SubTestType::findOrFail($id);
        return response()->json($sub_test);
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
        $sub_test = SubTestType::findOrFail($id);
        $sub_test->test_id = $request->edit_test_type;
        $sub_test->test_name = $request->edit_test_name;
        if ($request->is_show == "on") {
            $sub_test->is_show = 1;
        } else {
            $sub_test->is_show = 0;
        }
        if ($sub_test->save()) {
            return response()->json(['success' => true, 'message' => 'Sub Test type added Sucessfully.', 'data' => $sub_test], 200);
        }
    }
    public function status($id)
    {
        $test_type = SubTestType::findOrFail($id);
        $test_type->is_show = !$test_type->is_show;
        $test_type->save();
        return response()->json(['success' => true, 'message' => 'Sub Test type status change sucessfully.', 'data' => []], 200);
    }
    public function destroy($id)
    {
        $test_type = SubTestType::findOrFail($id);
        if ($test_type->delete()) {
            return response()->json(['success' => true, 'message' => 'Sub Test type has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }

}
