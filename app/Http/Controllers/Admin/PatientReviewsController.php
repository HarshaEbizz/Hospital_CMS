<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PatientReviews;
use App\Models\Specialities;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PatientReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $data = [];
        $data['specialities'] = Specialities::orderby('name')->get();
        return view('admin.pages.patient_reviews')->with($data);
    }
    public function store(Request $request)
    {
        if ($request->feedback_type == "write") {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'speciality_id' => 'required',
                'rating' => 'required',
                'message' => 'required',
                'photo' => 'mimes:jpeg,jpg,png,gif,jfif',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'video_url' => 'required',
            ]);
        }
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);   
        $review = new PatientReviews();
        $review->feedback_type = $request->feedback_type;
        $review->first_name = $request->first_name;
        $review->last_name = $request->last_name;
        $review->speciality_id = $request->speciality_id;
        $review->rating = $request->rating;
        $review->message = $request->message;
        $review->image_path = 'app/public/uploads/patient_reviews/';
        if ($request->video_url) {
            $review->video_url = trim($request->video_url);
            $v_id = $this->get_youtube_video_id(trim($request->video_url));
            $review->video_id = $v_id;
            $review->thumb_image = "http://img.youtube.com/vi/" . $v_id . "/maxresdefault.jpg";
        }
        if ($request->hasfile('photo')) {
            $review->image_name = $this->crop_image_url($request->photo_url, 'public/uploads/patient_reviews/');
        }
        if ($review->save()) {
            return response()->json(['success' => true, 'message' => 'Reviews Added Sucessfully.', 'data' => $review], 200);
        }
    }
    public function list()
    {
        $data = PatientReviews::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('feedback_type', function (PatientReviews $review) {
                if ($review->feedback_type == "write") {
                    return 'Written message';
                } else {
                    return 'Video message';
                }
            })
            ->addColumn('speciality', function (PatientReviews $review) {
                return $review->Specialities->name;
            })
            ->addColumn('actions', function (PatientReviews $review) {
                $edit_link = ' <button type="button" class="btn btn-primary btn-icon-text edit_review" value="' . $review->id . '">
        <i class="fa fa-solid fa-pencil"></i></button>';

                $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_review" value="' . $review->id . '">
        <i class="fa fa-solid fa-trash"></i></button>';
                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['feedback_type','speciality','status', 'actions'])
            ->toJson();
    }
    public function edit($id)
    {
        $review = PatientReviews::findOrFail($id);
        return response()->json($review);
    }
    public function update(Request $request, $id)
    {
        if ($request->edit_feedback_type == "write") {
            $validator = Validator::make($request->all(), [
                'edit_first_name' => 'required',
                'edit_last_name' => 'required',
                'edit_speciality_id' => 'required',
                'edit_rating' => 'required',
                'edit_message' => 'required',
                'edit_photo' => 'mimes:jpeg,jpg,png,gif,jfif',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'edit_video_url' => 'required',
            ]);
        }
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $review = PatientReviews::findOrFail($id);
        $review->feedback_type = $request->edit_feedback_type;
        $review->first_name = $request->edit_first_name;
        $review->last_name = $request->edit_last_name;
        $review->speciality_id = $request->edit_speciality_id;
        $review->rating = $request->edit_rating;
        $review->message = $request->edit_message;
        $review->image_path = 'app/public/uploads/patient_reviews/';
        if ($request->edit_video_url) {
            $review->video_url = trim($request->edit_video_url);
            $v_id = $this->get_youtube_video_id(trim($request->edit_video_url));
            $review->video_id = $v_id;
            $review->thumb_image = "http://img.youtube.com/vi/" . $v_id . "/maxresdefault.jpg";
        } else {
            $review->video_url = null;
            $review->video_id = null;
            $review->thumb_image = null;
        }
        if ($request->hasfile('edit_photo')) {
            $path = storage_path('app/public/uploads/patient_reviews/' . $review->image_name);
            if (File::exists($path)) {
                File::delete($path);
            }
            $review->image_name = $this->crop_image_url($request->edit_photo_url, 'public/uploads/patient_reviews/');
        }
        if ($review->save()) {
            return response()->json(['success' => true, 'message' => 'Reviews Updated Sucessfully.', 'data' => $review], 200);
        }
    }
    public function destroy($id)
    {
        $review = PatientReviews::findOrFail($id);
        if ($review->delete()) {
            return response()->json(['success' => true, 'message' => 'Review has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
    public function get_youtube_video_id($url)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        $video_id = $match[1];
        return $video_id;
    }
}
