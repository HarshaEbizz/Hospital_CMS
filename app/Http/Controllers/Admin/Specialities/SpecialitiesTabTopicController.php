<?php

namespace App\Http\Controllers\Admin\Specialities;

use App\Http\Controllers\Controller;
use App\Models\Specialities;
use App\Models\SpecialitiesContent;
use App\Models\SpecialitiesTabTopics;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use  \Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\SpecialitiesTabContent;
use Auth;

class SpecialitiesTabTopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function tab_content($id)
    {
        $specialities = Specialities::findOrFail($id);
        $topics = SpecialitiesTabTopics::where('specialities_id', $id)->get();
        return view('admin.pages.specialities.edit_tab_content', compact('specialities', 'topics'));
    }
    public function get_tab_topics($id)
    {
        $topics = SpecialitiesTabTopics::where('specialities_id', $id)->get();
        if (count($topics) > 0) {
            return response()->json(['success' => true, 'data' => $topics], 200);
        }
        return response()->json(['success' => false, 'message' => 'Firstly  Add Tab Topic.'], 200);
    }
    public function create()
    {
        # code...
    }
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'topic_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $topic = new SpecialitiesTabTopics();
        $topic->specialities_id = $id;
        $topic->topic_name = $request->topic_name;

        if ($topic->save()) {
            return response()->json(['success' => true, 'message' => 'Tab topic added successfully.', 'data' => $topic], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong."], 202);
        }
    }
    public function edit($id)
    {
        $topic = SpecialitiesTabTopics::findOrFail($id);
        return response()->json($topic);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'edit_topic_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $topic = SpecialitiesTabTopics::findOrFail($id);
        $topic->topic_name = $request->edit_topic_name;

        if ($topic->save()) {
            return response()->json(['success' => true, 'message' => 'Tab topic updated successfully.', 'data' => $topic], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong."], 202);
        }
    }
    public function status($id)
    {
        $topic = SpecialitiesTabTopics::findOrFail($id);
        $topic->status = !$topic->status;
        $topic->save();
        return response()->json(['success' => true, 'message' => 'Topic status change sucessfully.', 'data' => []], 200);
    }
    public function destroy($id)
    {
        $topic = SpecialitiesTabTopics::findOrFail($id);
        $tab_content = SpecialitiesTabContent::where('tab_content_type', 'image_content')->where('topic_id', $id)->first();
        if (isset($tab_content)) {
            $path = storage_path('app/public/uploads/specialities/' . $topic->specialities_id . '/' . $tab_content->image_name);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $tab_content = SpecialitiesTabContent::where('topic_id', $id)->delete();
        if ($topic->delete()) {
            return response()->json(['success' => true, 'message' => 'Specialities has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
