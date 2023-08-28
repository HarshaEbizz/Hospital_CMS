<?php

namespace App\Http\Controllers\Admin\Patients_Guide;

use App\Http\Controllers\Controller;
use App\Models\DoAndDonts;
use App\Models\DoAndDontsContent;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class DoAndDontsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
        $this->data = [];
    }

    public function index()
    {
        $do_and_donts = DoAndDonts::with('Content')->first();
        $this->data['do_and_donts'] = $do_and_donts;
        return view('admin.pages.patient_guide.dos_donts.index')->with($this->data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $do_and_donts = DoAndDonts::first();
        if (empty($do_and_donts)) {
            $do_and_donts = new DoAndDonts();
            $do_and_donts->heading = $request->heading;
            $do_and_donts->title = $request->title;
            $do_and_donts->do = $request->do;
            $do_and_donts->donts = $request->donts;
            $do_and_donts->image_path = 'app/public/uploads/patient_guide/dos_donts/';
            if ($request->hasfile('cover_image')) {
                $do_and_donts->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_guide/dos_donts/');
            }
            $do_and_donts->save();
        } else {
            $do_and_donts->heading = $request->heading;
            $do_and_donts->title = $request->title;
            $do_and_donts->do = $request->do;
            $do_and_donts->donts = $request->donts;
            $do_and_donts->image_path = 'app/public/uploads/patient_guide/dos_donts/';
            if ($request->hasfile('cover_image')) {
                $path = storage_path('app/public/uploads/patient_guide/dos_donts/' . $do_and_donts->cover_image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $do_and_donts->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/patient_guide/dos_donts/');
            }
            $do_and_donts->save();
        }
        if (isset($request->subtitle)) {
            for ($i = 0; $i < (count($request->subtitle)); $i++) {
                if ($request->subtitle[$i] != null && $request->description[$i] != null) {
                    $content = [];
                    if (isset($request->content_id)) {
                        if (isset($request->content_id[$i])) {
                            $content = DoAndDontsContent::findOrFail($request->content_id[$i]);
                            $content->do_and_donts_id = $do_and_donts->id;
                            $content->subtitle = $request->subtitle[$i];
                            $content->description = $request->description[$i];
                            $content->save();
                        } else {
                            $content = new DoAndDontsContent();
                            $content->do_and_donts_id = $do_and_donts->id;
                            $content->subtitle = $request->subtitle[$i];
                            $content->description = $request->description[$i];
                            $content->save();
                        }
                    } else {
                        $content = new DoAndDontsContent();
                        $content->do_and_donts_id = $do_and_donts->id;
                        $content->subtitle = $request->subtitle[$i];
                        $content->description = $request->description[$i];
                        $content->save();
                    }
                }
            }
        }
        return response()->json(['success' => true, 'message' => 'Do’s & Don’ts has been updated.', 'data' => $do_and_donts], 200);
    }
    public function content($count)
    {
        $returnHTML = view('admin.pages.patient_guide.dos_donts.content')->with('count', $count)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }
    public function content_delete($id)
    {
        $content = DoAndDontsContent::findOrFail($id);
        if ($content->delete()) {
            return response()->json(['success' => true, 'message' => 'Content has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
