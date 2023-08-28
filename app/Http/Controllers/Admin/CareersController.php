<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobAlertMessage;
use App\Models\JobApplyList;
use App\Models\JobOpening;
use Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use  \Illuminate\Support\Str;
use App\Exports\JobApplierExport;
use Maatwebsite\Excel\Facades\Excel;

class CareersController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->middleware('admin');
        $this->data = [];
    }

    public function uniqueSlug($name)
    {
        $slug = Str::slug($name, '_');
        $count = JobOpening::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? $count++ : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }

    public function index()
    {
        return view('admin.pages.careers');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'recuirement_dept' => 'required',
            'department_name' => 'required',
            'designation' => 'required',
            'location' => 'required',
            'opening' => 'required|numeric||min:1|max:100',
            'experience' => 'required',
            'qualification' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $opening = new JobOpening();
        $opening->recuirement_dept = $request->recuirement_dept;
        $opening->department_name = $request->department_name;
        $opening->designation = $request->designation;
        $opening->slug = $this->uniqueSlug($request->designation);
        $opening->location = $request->location;
        $opening->opening = $request->opening;
        $opening->experience = $request->experience;
        $opening->qualification = $request->qualification;
        $opening->description = $request->description;
        if ($opening->save()) {
            return response()->json(['success' => true, 'message' => 'Job opening Added sucessfully.'], 200);
        }
    }
    public function list()
    {
        $data = JobOpening::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function (JobOpening $opening) {
                if ($opening->status == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $opening->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $opening->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (JobOpening $opening) {
                // $edit_link = ' <button type="button" class="btn btn-primary btn-icon-text edit_opening" value="' . $opening->id . '"> <i class="fa fa-solid fa-pencil"></i></button>';

                // $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_opening" value="' . $opening->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $edit_link = ' <a href="' . route('admin.careers.edit', [$opening->id]) . '"  type="button" class="btn btn-primary btn-icon-text edit_opening" value="' . $opening->id . '"> <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_opening"  href="' . route('admin.careers.destroy', [$opening->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['status', 'actions'])
            ->toJson();
    }
    public function edit($id)
    {
        $opening = JobOpening::findOrFail($id);
        return response()->json($opening);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'edit_recuirement_dept' => 'required',
            'edit_department_name' => 'required',
            'edit_designation' => 'required',
            'edit_location' => 'required',
            'edit_opening' => 'required|numeric|min:1|max:100',
            'edit_experience' => 'required',
            'edit_qualification' => 'required',
            'edit_description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $opening = JobOpening::findOrFail($id);
        if ((trim($opening->designation) != trim($request->edit_designation))) {
            $opening->slug = $this->uniqueSlug($request->edit_designation);
        }
        $opening->recuirement_dept = $request->edit_recuirement_dept;
        $opening->department_name = $request->edit_department_name;
        $opening->designation = $request->edit_designation;
        $opening->location = $request->edit_location;
        $opening->opening = $request->edit_opening;
        $opening->experience = $request->edit_experience;
        $opening->qualification = $request->edit_qualification;
        $opening->description = $request->edit_description;
        if ($opening->save()) {
            return response()->json(['success' => true, 'message' => 'Job opening Updated sucessfully.'], 200);
        }
    }
    public function destroy($id)
    {
        $opening = JobOpening::findOrFail($id);
        JobApplyList::where('job_id', $id)->delete();
        if ($opening->delete()) {
            return response()->json(['success' => true, 'message' => 'Job opening has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
    public function status($id)
    {
        $opening = JobOpening::findOrFail($id);
        $opening->status = !$opening->status;
        $opening->save();
        return response()->json(['success' => true, 'message' => 'Job opening status change sucessfully.', 'data' => []], 200);
    }
    public function job_apply_index()
    {
        $opening = JobOpening::where('status', 1)->get();
        $this->data['opening'] = $opening;
        return view('admin.pages.job_apply_index')->with($this->data);
    }
    public function job_apply_list(Request $request)
    {
        $data = JobApplyList::latest()->select('*');
        return DataTables::of($data)
            ->addIndexColumn()
            // ->addColumn('status', function (JobApplyList $jobApplyList) {
            //     if ($jobApplyList->status == 0) {
            //         $status_link = '<button type="button" class="btn btn-info  status_btn" value="' . $jobApplyList->id . '">Pending</button>';
            //     } elseif ($jobApplyList->status == 1) {
            //         $status_link = '<button type="button" class="btn btn-success status_btn" value="' . $jobApplyList->id . '">Approve</button>';
            //     } else {
            //         $status_link = '<button type="button" class="btn btn-danger status_btn" value="' . $jobApplyList->id . '">Decline</button>';
            //     }
            //     return $status_link;
            // })
            ->addColumn('view', function (JobApplyList $jobApplyList) {
                return '<a title="View Details" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light view_appiler_details" data-id="' . $jobApplyList->id . '">' .
                    '<i class="fa fa-eye"></i>' .
                    '</a>';
            })
            ->filter(function ($instance) use ($request) {
                if (!empty($request->get('job_position'))) {
                    $job_position = $request->get('job_position');
                    $instance->where(function ($query) use ($job_position) {
                        $query->where('job_position', 'like', '%' . $job_position . '%');
                    });
                }
                if (!empty($request->get('search'))) {
                    $search = $request->get('search');
                    $instance->where(function ($query) use ($search) {
                        $query->Where('application_type', 'like', '%' . $search . '%')
                            ->orWhere('full_name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    });
                }
            })
            ->rawColumns(['view', 'status'])->toJson();
    }
    public function job_apply_view($id)
    {
        $applier  = JobApplyList::findOrFail($id);
        return response()->json($applier);
        // dd($applier);
        // $this->data['applier'] = $applier;
        // // return view('admin.pages.job_apply_index')->with($this->data);
    }
    public function job_applier_export()
    {
        return Excel::download(new JobApplierExport, 'job_applier_list.xlsx');
    }
    public function alert_msg_data()
    {
        $alert_msg = JobAlertMessage::first();
        return response()->json($alert_msg);
    }
    public function alert_msg_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $alert_msg = JobAlertMessage::first();
        if (empty($alert_msg)) {
            $alert_msg = new JobAlertMessage();
            $alert_msg->title = $request->title;
            $alert_msg->message = $request->message;
            if ($request->is_show == "on") {
                $alert_msg->status = 1;
            } else {
                $alert_msg->status = 0;
            }
        } else {
            $alert_msg->title = $request->title;
            $alert_msg->message = $request->message;
            if ($request->is_show == "on") {
                $alert_msg->status = 1;
            } else {
                $alert_msg->status = 0;
            }
        }
        $alert_msg->save();
        return response()->json(['success' => true, 'message' => 'Alert Message updated Sucessfully.', 'data' => []], 200);
    }
}
