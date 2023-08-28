<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\AchievementCertificates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.achievement_certificates');
    }


    public function list()
    {
        $data = AchievementCertificates::orderby('order')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function (AchievementCertificates $cert) {
                $img = str_replace("/public", "", url('/')) . '/storage/app/public/uploads/achievement_certificates/' . $cert->image_name;
                return '<img src="' . $img . '" style="height:150px;">';
            })
            ->addColumn('status', function (AchievementCertificates $cert) {
                if ($cert->status == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $cert->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $cert->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (AchievementCertificates $cert) {
                // $action_link = '<button type="button" class="btn btn-primary btn-icon-text edit_image" value="' . $cert->id . '"><i class="fa fa-solid fa-pencil"></i></button>  <button type="button" class="btn btn-danger btn-icon-text delete_image" value="' . $cert->id . '">
                // <i class="fa fa-solid fa-trash"></i></button>';

                $action_link = ' <a class="btn btn-primary btn-icon-text edit_image" data-id="' . $cert->id . '">
                <i class="fa fa-solid fa-pencil"></i></a> <a  class="btn btn-danger btn-icon-text delete_image"  href="' . route('admin.certificates.destroy', [$cert->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $action_link;
            })
            ->rawColumns(['status', 'image', 'actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'certificate_title' => 'required',
            'certificate_image' => 'required|mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $certificate = new AchievementCertificates();
        $certificate->certificate_title = $request->certificate_title;
        $certificate->detail = $request->detail;
        $certificate->image_path = 'app/public/uploads/achievement_certificates/';
        if ($request->hasfile('certificate_image')) {
            $certificate->image_name = $this->crop_image_url($request->certificate_image_url, 'public/uploads/achievement_certificates/');
        }
        $certificate->save();
        return response()->json(['success' => true, 'message' => 'Achievement certificate(s) uploaded sucessfully.'], 200);
    }
    public function show($id)
    {
        $certificate = AchievementCertificates::findOrFail($id);
        if ($certificate) {
            return response()->json(['success' => true, 'message' => 'Achievement certificate details.', 'data' => $certificate], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
    public function update_certificate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'certificate_title' => 'required',
            'certificate_image' => 'mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $certificate = AchievementCertificates::findOrFail($request->id);
        if ($certificate) {
            $certificate->certificate_title = $request->certificate_title;
            $certificate->detail = $request->detail;
            $certificate->image_path = 'app/public/uploads/achievement_certificates/';

            if ($request->hasfile('certificate_image')) {
                $path = storage_path('app/public/uploads/achievement_certificates/' . $certificate->image_name);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $certificate->image_name = $this->crop_image_url($request->edit_certificate_image_url, 'public/uploads/achievement_certificates/');
            }
            $certificate->save();
            return response()->json(['success' => true, 'message' => 'Achievement certificate updated sucessfully.'], 200);
        }
    }
    public function status($id)
    {
        $certificate = AchievementCertificates::findOrFail($id);
        $certificate->status = !$certificate->status;
        $certificate->save();
        return response()->json(['success' => true, 'message' => 'Achievement certificate status change sucessfully.', 'data' => []], 200);
    }
    public function order(Request $request)
    {
        $certificates = AchievementCertificates::all();
        foreach ($certificates as $certificate) {
            $certificate->timestamps = false; // To disable update_at field updation
            $id = $certificate->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $certificate->update(['order' => $order['position']]);
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'Slider order change sucessfully.', 'data' => []], 200);
    }
    public function destroy($id)
    {
        $certificate = AchievementCertificates::findOrFail($id);
        $path = storage_path('app/public/uploads/achievement_certificates/' . $certificate->image_name);
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($certificate->delete()) {
            return response()->json(['success' => true, 'message' => 'Achievement certificate has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
}
