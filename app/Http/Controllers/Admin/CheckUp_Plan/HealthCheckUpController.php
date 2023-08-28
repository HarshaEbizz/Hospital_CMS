<?php

namespace App\Http\Controllers\Admin\CheckUp_Plan;

use App\Http\Controllers\Controller;
use App\Models\CheckUpPlan;
use App\Models\SubTestType;
use App\Models\TestType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\File;

class HealthCheckUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $this->data['test_type'] = TestType::get();
        // $this->data['sub_test_type'] = SubTestType::get();
        return view('admin.pages.checkup_plan.plan.index')->with($this->data);
    }
    public function get_subtest($id)
    {
        $model = SubTestType::where('test_id', $id)->get();
        return $model;
    }
    public function create()
    {
        $this->data['test_type'] = TestType::get();
        $this->data['sub_test_type'] = SubTestType::get();
        return view('admin.pages.checkup_plan.plan.create')->with($this->data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:check_up_plans',
            'price' => 'required|numeric',
            'test_type' => 'required',
            // 'sub_test_type' => 'required',
            'file' => 'required',
            'file.*' => 'mimes:jpeg,jpg,png,pdf',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request->all());
        $plan = new CheckUpPlan();
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->test_type = implode(",", $request->test_type);
        // $plan->sub_test_type = implode(",", $request->sub_test_type);
        $content = [];
        if ($request->hasfile('file')) {
            foreach ($request->file as $key => $file) {
                $fileName = '';
                $fileName = random_int(1000000000, 9999999999) . $key . '.' . $file->extension();
                if ($file->storeAs('public/uploads/checkup_plan/', $fileName)) {
                    $content[$key] = ($fileName);
                }
            }
            $plan->file_name = serialize($content);
            $plan->file_path = 'app/public/uploads/checkup_plan/';
        }
        if ($plan->save()) {
            return response()->json(['success' => true, 'message' => 'plan Added Sucessfully.', 'data' => $plan], 200);
        }
    }
    public function list()
    {
        $data = CheckUpPlan::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function (CheckUpPlan $plan) {
                if ($plan->is_show == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                data-offstyle="danger" value="' . $plan->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                data-offstyle="danger" value="' . $plan->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (CheckUpPlan $plan) {
                $edit_link = ' <a type="button" href="' . route('admin.health_checkup_plan.edit', [$plan->id]) . '" class="btn btn-primary btn-icon-text edit_data" value="' . $plan->id . '"> <i class="fa fa-solid fa-pencil"></i></a>';

                // $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_plan" value="' . $plan->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_plan"  href="' . route('admin.health_checkup_plan.destroy', [$plan->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['status', 'actions'])
            ->toJson();
    }
    public function status($id)
    {
        $plan = CheckUpPlan::findOrFail($id);
        $plan->is_show = !$plan->is_show;
        $plan->save();
        return response()->json(['success' => true, 'message' => 'Plan status change sucessfully.', 'data' => []], 200);
    }
    public function edit($id)
    {
        $this->data['test_type'] = TestType::get();
        // $this->data['sub_test_type'] = SubTestType::get();
        $this->data['plan'] = CheckUpPlan::findOrFail($id);
        return view('admin.pages.checkup_plan.plan.edit')->with($this->data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'test_type' => 'required',
            // 'sub_test_type' => 'required',
            'file.*' => 'mimes:jpeg,jpg,png,pdf',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $plan = CheckUpPlan::findOrFail($id);
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->test_type = implode(",", $request->test_type);
        // $plan->sub_test_type = implode(",", $request->sub_test_type);
        $content = [];
        if ($request->hasfile('file')) {
            $file_name = $plan ? unserialize($plan->file_name) : '';
            if(!empty($file_name)){
                foreach ($file_name as $key => $f_name) {
                    $path = storage_path('app/public/uploads/checkup_plan/' . $f_name);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
            foreach ($request->file as $key => $file) {
                $fileName = '';
                $fileName = random_int(1000000000, 9999999999) . $key . '.' . $file->extension();
                if ($file->storeAs('public/uploads/checkup_plan/', $fileName)) {
                    $content[$key] = ($fileName);
                }
            }
            $plan->file_name = serialize($content);
            $plan->file_path = 'app/public/uploads/checkup_plan/';
        }
        // dd($plan);
        if ($plan->save()) {
            return response()->json(['success' => true, 'message' => 'plan Updated Sucessfully.', 'data' => $plan], 200);
        }
    }
    public function destroy($id)
    {
        $plan = CheckUpPlan::findOrFail($id);
        $file_name = $plan ? unserialize($plan->file_name) : '';
        if(!empty($file_name)){
            foreach ($file_name as $key => $f_name) {
                $path = storage_path('app/public/uploads/checkup_plan/' . $f_name);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }
        if ($plan->delete()) {
            return response()->json(['success' => true, 'message' => 'plan has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
    // public function add_test_field($count)
    // {
    //     $returnHTML = view('admin.pages.checkup_plan.testcontent')->with('count', $count)->with('test_type', TestType::get())->render();
    //     return response()->json(array('success' => true, 'html' => $returnHTML));
    // }
}
