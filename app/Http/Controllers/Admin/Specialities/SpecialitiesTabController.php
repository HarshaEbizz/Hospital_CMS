<?php

namespace App\Http\Controllers\Admin\Specialities;

use App\Http\Controllers\Controller;
use App\Models\Specialities;
use App\Models\SpecialitiesContent;
use App\Models\SpecialitiesTabContent;
use App\Models\SpecialitiesTabTopics;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use  \Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class SpecialitiesTabController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function store(Request $request, $id)
    {
        if ($request->tab_content_type == "image_content") {
            $validator = Validator::make($request->all(), [
                'topic_id' => 'required',
                'tab_content_type' => 'required',
                'tab_details' => 'required',
                'tab_image' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }
        } elseif($request->tab_content_type == "content") {
            $validator = Validator::make($request->all(), [
                'topic_id' => 'required',
                'tab_content_type' => 'required',
                'split_content' => 'required',
                'tab_title' => 'required',
                'tab_details' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }
        } elseif($request->tab_content_type == "banner_image") {
            $validator = Validator::make($request->all(), [
                'topic_id' => 'required',
                'tab_content_type' => 'required',
                'tab_title' => 'required',
                'tab_image' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }
        } elseif($request->tab_content_type == "image") {
            $validator = Validator::make($request->all(), [
                'topic_id' => 'required',
                'tab_content_type' => 'required',
                'tab_image' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }
        } elseif($request->tab_content_type == "question_answer") {
            $validator = Validator::make($request->all(), [
                'topic_id' => 'required',
                'tab_content_type' => 'required',
                'question' => 'required',
                'tab_details' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }
        }
        // $validator = Validator::make($request->all(), [
        //     'tab_content_for.*' => 'required',
        //     'tab_title.*' => 'required',
        //     'tab_details.*' => 'required',
        //     'tab_image.*' => 'required',
        // ]);


        $order = SpecialitiesTabContent::where('specialities_id',$id)->where('topic_id', $request->topic_id)->max('order');
        
        $specialities = Specialities::findOrFail($id);
        $tab_content = new SpecialitiesTabContent();
        $tab_content->specialities_id = $id;
        $tab_content->topic_id = $request->topic_id;
        $tab_content->tab_content_type = $request->tab_content_type;
        $tab_content->split_content = (isset($request->split_content)) ? $request->split_content : null;
        $tab_content->tab_title = (isset($request->tab_title)) ? $request->tab_title : null;
        $tab_content->sub_title = (isset($request->sub_title)) ? $request->sub_title : null;
        $tab_content->tab_details = (isset($request->tab_details)) ? $request->tab_details : null;
        $tab_content->video_url = (isset($request->video_url)) ? $request->video_url : null;
        $tab_content->direction = (isset($request->direction)) ? $request->direction : null;
        $tab_content->question = (isset($request->question)) ? $request->question : null;
        $tab_content->order = (isset($order)) ? $order + 1 : 0;
        if ($request->hasfile('tab_image')) {
            $tab_content->image_path = 'app/public/uploads/specialities/' . $specialities->slug . '/';
            $tab_content->image_name = $this->crop_image_url($request->tab_image_url, 'public/uploads/specialities/' . $specialities->slug . '/');
        }
        $tab_content->save();
        // if (isset($request->tab_content_for)) {
        //     for ($i = 0; $i < (count($request->tab_content_for)); $i++) {
        //         if ($request->tab_content_for[$i] == 'content') {
        //             if (isset($request->tab_title[$i])  && isset($request->tab_details[$i])) {
        //                 if (isset($request->tab_content_id) && isset($request->tab_content_id[$i])) {
        //                     $content = SpecialitiesTabContent::findOrFail($request->tab_content_id[$i]);
        //                     $content->specialities_id = $id;
        //                     $content->topic_id = $request->topic_id;
        //                     $content->tab_content_type	 = $request->tab_content_for[$i];
        //                     $content->split_content = (isset($request->split_content[$i])) ? $request->split_content[$i] : null;
        //                     $content->tab_title = (isset($request->tab_title[$i])) ? $request->tab_title[$i] : null;
        //                     $content->tab_details = (isset($request->tab_details[$i])) ? $request->tab_details[$i] : null;
        //                     $content->save();
        //                 } else {
        //                     $content = [];
        //                     $content = new SpecialitiesTabContent();
        //                     $content->specialities_id = $id;
        //                     $content->topic_id = $request->topic_id;
        //                     $content->tab_content_type = $request->tab_content_for[$i];
        //                     $content->split_content = (isset($request->split_content[$i])) ? $request->split_content[$i] : null;
        //                     $content->tab_title = (isset($request->tab_title[$i])) ? $request->tab_title[$i] : null;
        //                     $content->tab_details = (isset($request->tab_details[$i])) ? $request->tab_details[$i] : null;
        //                     $content->save();
        //                 }
        //             }
        //         }
        //         if ($request->tab_content_for[$i] == 'image_content') {
        //             if ($request->tab_details[$i] != null) {
        //                 if (isset($request->tab_content_id) && isset($request->tab_content_id[$i])) {
        //                     $content = SpecialitiesTabContent::findOrFail($request->tab_content_id[$i]);
        //                     $content->specialities_id = $id;
        //                     $content->topic_id = $request->topic_id;
        //                     $content->tab_content_type = $request->tab_content_for[$i];
        //                     $content->tab_details = (isset($request->tab_details[$i])) ? $request->tab_details[$i] : null;
        //                     $content->image_path = 'app/public/uploads/specialities/'.$id.'/';
        //                     $image = 'tab_image_'.$request->topic_id;
        //                     $image_url = 'tab_image_'.$request->topic_id.'_url';
        //                     if ($request[$image] != null) {
        //                         $path = storage_path('app/public/uploads/specialities/'.$id.'/' . $content->image_name);
        //                         if (File::exists($path)) {
        //                             File::delete($path);
        //                         }
        //                         $content->image_name = $this->crop_image_url($request[$image_url],'public/uploads/specialities/'.$id.'/');
        //                     }
        //                     $content->save();
        //                 } else {
        //                     $content = [];
        //                     $content = new SpecialitiesTabContent();
        //                     $content->specialities_id = $id;
        //                     $content->topic_id = $request->topic_id;
        //                     $content->tab_content_type = $request->tab_content_for[$i];
        //                     $content->tab_details = (isset($request->tab_details[$i])) ? $request->tab_details[$i] : null;
        //                     $content->image_path = 'app/public/uploads/specialities/'.$id.'/';
        //                     $image = 'tab_image_'.$request->topic_id;
        //                     $image_url = 'tab_image_'.$request->topic_id.'_url';
        //                     if ($request[$image] != null) {
        //                         $content->image_name = $this->crop_image_url($request[$image_url],'public/uploads/specialities/'.$id.'/');
        //                     }
        //                     $content->save();
        //                 }
        //             }
        //         }
        //     }
        // }
        return response()->json(['success' => true, 'message' => 'Tab topic added successfully.'], 200);
    }
    public function tab_content($count, $tab_content_type, $topic_id)
    {
        $returnHTML = view('admin.pages.specialities.tab_content')->with('count', $count)->with('tab_content_type', $tab_content_type)->with('topic_id', $topic_id)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML, 'tab_content_type' => $tab_content_type, 'topic_id' => $topic_id));
    }
    public function edit($id)
    {
        $tab_content = SpecialitiesTabContent::findOrFail($id);
        return response()->json($tab_content);
    }
    public function update(Request $request, $id)
    {
        if ($request->edit_tab_content_type == "image_content") {
            $validator = Validator::make($request->all(), [
                'edit_topic_id' => 'required',
                'edit_tab_content_type' => 'required',
                'edit_tab_details' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }
        } elseif($request->edit_tab_content_type == "content") {
            $validator = Validator::make($request->all(), [
                'edit_topic_id' => 'required',
                'edit_tab_content_type' => 'required',
                'edit_split_content' => 'required',
                'edit_tab_title' => 'required',
                'edit_tab_details' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }
        } elseif($request->edit_tab_content_type == "banner_image") {
            $validator = Validator::make($request->all(), [
                'edit_topic_id' => 'required',
                'edit_tab_content_type' => 'required',
                'edit_tab_title' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }
        } elseif($request->edit_tab_content_type == "image") {
            $validator = Validator::make($request->all(), [
                'edit_topic_id' => 'required',
                'edit_tab_content_type' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }
        } elseif($request->edit_tab_content_type == "question_answer") {
            $validator = Validator::make($request->all(), [
                'edit_topic_id' => 'required',
                'edit_tab_content_type' => 'required',
                'edit_question' => 'required',
                'edit_tab_details' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
            }
        }

        $tab_content = SpecialitiesTabContent::with('Specialities')->findOrFail($id);
        $tab_content->topic_id = $request->edit_topic_id;
        $tab_content->tab_content_type = $request->edit_tab_content_type;
        $tab_content->split_content = (isset($request->edit_split_content)) ? $request->edit_split_content : null;
        $tab_content->tab_title = (isset($request->edit_tab_title)) ? $request->edit_tab_title : null;
        $tab_content->sub_title = (isset($request->edit_sub_title)) ? $request->edit_sub_title : null;
        $tab_content->tab_details = (isset($request->edit_tab_details)) ? $request->edit_tab_details : null;
        $tab_content->video_url = (isset($request->edit_video_url)) ? $request->edit_video_url : null;
        $tab_content->direction = (isset($request->edit_direction)) ? $request->edit_direction : null;
        $tab_content->question = (isset($request->edit_question)) ? $request->edit_question : null;
        if ($request->hasfile('edit_tab_image')) {
            $tab_content->image_path = 'app/public/uploads/specialities/' . $tab_content->Specialities->slug . '/';
            $tab_content->image_name = $this->crop_image_url($request->edit_tab_image_url, 'public/uploads/specialities/' . $tab_content->Specialities->slug . '/');
        }
        $tab_content->save();
        return response()->json(['success' => true, 'message' => 'Tab topic Upadted successfully.'], 200);

    }
    public function order(Request $request,$topic_id)
    {
        $tab_contents = SpecialitiesTabContent::where('topic_id',$topic_id)->get();
        foreach ($tab_contents as $tab_content) {
            $tab_content->timestamps = false; // To disable update_at field updation
            $id = $tab_content->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $tab_content->update(['order' => $order['position']]);
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'Content order change sucessfully.', 'data' => []], 200);
    }
    public function destroy($id)
    {
        $tab_content = SpecialitiesTabContent::findOrFail($id);
        $path = storage_path('app/public/uploads/specialities/' . $tab_content->specialities_id . '/' . $tab_content->image_name);
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($tab_content->delete()) {
            return response()->json(['success' => true, 'message' => 'Specialities has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
