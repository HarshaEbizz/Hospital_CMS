<?php

namespace App\Http\Controllers\Admin\Specialities;

use App\Http\Controllers\Controller;
use App\Models\Specialities;
use App\Models\SpecialitiesContent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use  Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;

class SpecialitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.pages.specialities.index');
    }

    public function list()
    {
        $data = Specialities::orderby('name')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('description', function (Specialities $specialities) {
                $desc = strip_tags(html_entity_decode($specialities->description));
                $description = Str::limit($desc, 100);
                return $description;
            })
            ->addColumn('status', function (Specialities $specialities) {
                if ($specialities->is_show == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $specialities->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $specialities->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (Specialities $specialities) {
                $edit_link = ' <a href="' . route('admin.specialities.edit', [$specialities->id]) . '"  type="button" class="btn btn-primary btn-icon-text edit_term" value="' . $specialities->id . '">
                <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_specialities"  href="' . route('admin.specialities.destroy', [$specialities->id]) . '">
                <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['description', 'status', 'actions'])
            ->toJson();
    }
    public function create()
    {
        return view('admin.pages.specialities.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'top_cover_image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $specialities = new Specialities();
        $specialities->name = $request->name;
        $specialities->slug = $this->uniqueSlug($request->name);
        $specialities->banner_text = $request->banner_text;
        $specialities->description = $request->description;
        $specialities->is_show = 1;
        $specialities->image_path = 'app/public/uploads/specialities/'.$specialities->slug.'/';
        if ($request->hasfile('top_cover_image')) {
            $specialities->top_cover_image = $this->crop_image_url($request->top_cover_image_url, 'public/uploads/specialities/'.$specialities->slug.'/');
        }
        if ($request->hasfile('bottom_cover_image')) {
            $specialities->bottom_cover_image = $this->crop_image_url($request->bottom_cover_image_url,'public/uploads/specialities/'.$specialities->slug.'/');
        }
        if ($request->bottom_banner_status == "on") {
            $specialities->bottom_banner_status = 1;
        } else {
            $specialities->bottom_banner_status = 0;
        }
        $specialities->save();
        // dd($specialities->slug);
        if (isset($request->content_for)) {
            for ($i = 0; $i < (count($request->content_for)); $i++) {
                if ($request->content_for[$i] == 'content') {
                    if (isset($request->title[$i])  && isset($request->details[$i])) {
                        $content = [];
                        $content = new SpecialitiesContent();
                        $content->specialities_id = $specialities->id;
                        $content->content_type = $request->content_for[$i];
                        $content->title = (isset($request->title[$i])) ? $request->title[$i] : null;
                        $content->details = (isset($request->details[$i])) ? $request->details[$i] : null;
                        $content->save();
                    }
                }
                if ($request->content_for[$i] == 'image_content') {
                    if ($request->direction[$i] != null && $request->details[$i] != null) {
                        $content = [];
                        $content = new SpecialitiesContent();
                        $content->specialities_id = $specialities->id;
                        $content->content_type = $request->content_for[$i];
                        $content->direction = (isset($request->direction[$i])) ? $request->direction[$i] : null;
                        $content->details = (isset($request->details[$i])) ? $request->details[$i] : null;
                        $content->image_path = 'app/public/uploads/specialities/'.$specialities->slug.'/';
                        // dd($request->image_url[$i]);
                        // $content->image_name = $this->crop_image_url($request->image_url, 'public/uploads/specialities/'.$specialities->id.'/');
                        $image = 'image_'.$i;
                        $image_url = 'image_'.$i.'_url';
                        if ($request['image'][$i] != null) {
                            $content->image_name = $this->crop_image_url($request[$image_url], 'public/uploads/specialities/'.$specialities->slug.'/');
                        }
                        $content->save();
                    }
                }
                if ($request->content_for[$i] == 'image') {
                    $content = [];
                    $content = new SpecialitiesContent();
                    $content->specialities_id = $specialities->id;
                    $content->content_type = $request->content_for[$i];
                    $content->image_path = 'app/public/uploads/specialities/'.$specialities->slug.'/';
                    $content->image_name = $this->crop_image_url($request->image_url[$i], 'public/uploads/specialities/');
                    $content->video_url = $request->video_url[$i];
                    $content->save();
                }
            }
        }
        return response()->json(['success' => true, 'message' => 'Specialities has been Added.', 'data' => []], 200);
    }
    public function uniqueSlug($name)
    {
        $slug = Str::slug($name, '_');
        $count = Specialities::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? $count++ : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
    public function edit($id)
    {
        $specialities = Specialities::with('Content')->findOrFail($id);
        // dd(count($specialities->Content)>0);
        return view('admin.pages.specialities.edit', compact('specialities'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $specialities = Specialities::findOrFail($id);
        $specialities->name = $request->name;
        $specialities->banner_text = $request->banner_text;
        $specialities->description = $request->description;
        $specialities->is_show = 1;
        $specialities->image_path = 'app/public/uploads/specialities/'.$specialities->slug.'/';
        if ($request->hasfile('top_cover_image')) {
            $path = storage_path('app/public/uploads/specialities/'.$specialities->slug.'/' . $specialities->top_cover_image);
            if (File::exists($path)) {
                File::delete($path);
            }
            $specialities->top_cover_image = $this->crop_image_url($request->top_cover_image_url, 'public/uploads/specialities/'.$specialities->slug.'/');
        }
        if ($request->hasfile('bottom_cover_image')) {
            $path = storage_path('app/public/uploads/specialities/'.$specialities->slug.'/' . $specialities->bottom_cover_image);
            if (File::exists($path)) {
                File::delete($path);
            }
            $specialities->bottom_cover_image = $this->crop_image_url($request->bottom_cover_image_url,'public/uploads/specialities/'.$specialities->slug.'/');
        }
        if ($request->bottom_banner_status == "on") {
            $specialities->bottom_banner_status = 1;
        } else {
            $specialities->bottom_banner_status = 0;
        }
        // dd($request->all());
        // $record = Specialities::where('id', $id)->first();
        if ((trim($specialities->name) != trim($request->name))) {
            $specialities->slug = $this->uniqueSlug($request->name);
        }
        $specialities->save();
        // dd($specialities->slug);
        $exist_data =false;
        if (isset($request->content_for)) {
            $j = 0;
            for ($i = 0; $i < (count($request->content_for)); $i++) {
                if ($request->content_for[$i] == 'content') {
                    if (isset($request->title[$i])  && isset($request->details[$i])) {
                        if (isset($request->content_id) && isset($request->content_id[$i])) {
                            $content = SpecialitiesContent::findOrFail($request->content_id[$i]);
                            $content->specialities_id = $id;
                            $content->content_type = $request->content_for[$i];
                            $content->title = (isset($request->title[$i])) ? $request->title[$i] : null;
                            $content->details = (isset($request->details[$i])) ? $request->details[$i] : null;
                            $content->save();
                        } else {
                            $content = [];
                            $content = new SpecialitiesContent();
                            $content->specialities_id = $id;
                            $content->content_type = $request->content_for[$i];
                            $content->title = (isset($request->title[$i])) ? $request->title[$i] : null;
                            $content->details = (isset($request->details[$i])) ? $request->details[$i] : null;
                            $content->save();
                        }
                    }
                }
                if ($request->content_for[$i] == 'image_content') {
                    if ($request->direction[$i] != null && $request->details[$i] != null) {
                        if (isset($request->content_id) && isset($request->content_id[$i])) {
                            $exist_data =true;
                            $content = SpecialitiesContent::findOrFail($request->content_id[$i]);
                            $content->specialities_id = $id;
                            $content->content_type = $request->content_for[$i];
                            $content->direction = (isset($request->direction[$i])) ? $request->direction[$i] : null;
                            $content->details = (isset($request->details[$i])) ? $request->details[$i] : null;
                            // $content->image_path = 'app/public/uploads/specialities/'.$id.'/';
                            // dd($specialities->slug);
                            $content->image_path = 'app/public/uploads/specialities/'.$specialities->slug.'/';
                            $image = 'image_'.$request->content_id[$i];
                            $image_url = 'image_'.$request->content_id[$i].'_url';
                            // dd($image_url);
                            if ($request[$image_url]) {
                                $path = storage_path('app/public/uploads/specialities/'.$specialities->slug.'/' . $content->image_name);
                                if (File::exists($path)) {
                                    File::delete($path);
                                }
                                $content->image_name = $this->crop_image_url($request[$image_url], 'public/uploads/specialities/'.$specialities->slug.'/');
                            }
                            // dd($request->all());
                            // if ($request[$image] != null) {
                            // if (isset($request['image'][$request->content_id[$i]]) && $request['image'][$request->content_id[$i]] != null) {
                            // // dd($request[$image_url]);
                            // // if (isset($image) && $image != null) {
                            //     $path = storage_path('app/public/uploads/specialities/'.$id.'/' . $content->image_name);
                            //     if (File::exists($path)) {
                            //         File::delete($path);
                            //     }
                            //     $content->image_name = $this->crop_image_url($request[$image_url],'public/uploads/specialities/'.$id.'/');
                            // }
                            $content->save();
                        } else {
                            $content = [];
                            $content = new SpecialitiesContent();
                            $content->specialities_id = $id;
                            $content->content_type = $request->content_for[$i];
                            $content->direction = (isset($request->direction[$i])) ? $request->direction[$i] : null;
                            $content->details = (isset($request->details[$i])) ? $request->details[$i] : null;
                            // dd($specialities->slug);
                            $content->image_path = 'app/public/uploads/specialities/'.$specialities->slug.'/';
                            if ($exist_data==true) {
                                $image = 'image_'.$j;
                                $image_url = 'image_'. $j .'_url';
                                // dd($request['image'][$j]);
                                // if (isset($request['image'][$i]) && $request['image'][$i] != null) {
                                // if (isset($request['image'][$j]) && $request['image'][$j] != null) {
                                // dd($request[$image_url]);
                                if ($request[$image_url]) {
                                    // dd("in");
                                    $content->image_name = $this->crop_image_url($request[$image_url], 'public/uploads/specialities/'.$specialities->slug.'/');
                                }
                                // else{
                                //     // dd("out");
                                // }
                                $content->save();
                                $j++;
                            } else {
                                $image = 'image_'.$i;
                                $image_url = 'image_'.$i.'_url';
                                if (isset($request['image'][$i]) && $request['image'][$i] != null) {
                                    $content->image_name = $this->crop_image_url($request[$image_url], 'public/uploads/specialities/'.$specialities->slug.'/');
                                }
                                $content->save();
                            }
                        }
                    }
                }
                if ($request->content_for[$i] == 'image') {
                    if (isset($request->content_id) && isset($request->content_id[$i])) {
                        $content = SpecialitiesContent::findOrFail($request->content_id[$i]);
                        $content->specialities_id = $id;
                        $content->content_type = $request->content_for[$i];
                        $content->content_type = $request->content_for[$i];
                        $content->image_path = 'app/public/uploads/specialities/'.$specialities->slug.'/';
                        // if ($request->image != null) {
                        //     $content->image_name = $this->crop_image_url($request->image_url, 'public/uploads/specialities/');
                        // }
                        $image = 'image_'.$request->content_id[$i];
                        $image_url = 'image_'.$request->content_id[$i].'_url';
                        if ($request[$image_url]) {
                            $path = storage_path('app/public/uploads/specialities/'.$specialities->slug.'/' . $content->image_name);
                            if (File::exists($path)) {
                                File::delete($path);
                            }
                            $content->image_name = $this->crop_image_url($request[$image_url], 'public/uploads/specialities/'.$specialities->slug.'/');
                        }

                        $content->video_url = $request->video_url[$i];
                        $content->save();
                    } else {
                        $content = [];
                        $content = new SpecialitiesContent();
                        $content->specialities_id = $id;
                        $content->content_type = $request->content_for[$i];
                        $content->image_path = 'app/public/uploads/specialities/'.$specialities->slug.'/';
                        // if ($request->image != null) {
                        //     $content->image_name = $this->crop_image_url($request->image_url, 'public/uploads/specialities/');
                        // }
                        if ($exist_data==true) {
                            $image = 'image_'.$j;
                            $image_url = 'image_'. $j .'_url';
                            // dd($request['image'][$j]);
                            // if (isset($request['image'][$i]) && $request['image'][$i] != null) {
                            // if (isset($request['image'][$j]) && $request['image'][$j] != null) {
                            if ($request[$image_url]) {
                                $content->image_name = $this->crop_image_url($request[$image_url], 'public/uploads/specialities/'.$specialities->slug.'/');
                            }
                            $content->save();
                            $j++;
                        } else {
                            $image = 'image_'.$i;
                            $image_url = 'image_'.$i.'_url';
                            if (isset($request['image'][$i]) && $request['image'][$i] != null) {
                                $content->image_name = $this->crop_image_url($request[$image_url], 'public/uploads/specialities/'.$specialities->slug.'/');
                            }
                            $content->save();
                        }

                        $content->video_url = $request->video_url[$i];
                        $content->save();
                    }
                }
            }
        }
        // $record = Specialities::where('id', $id)->first();
        // if ((trim($record->name) != trim($request->name))) {
        //     $specialities->slug = $this->uniqueSlug($request->name);
        // }
        // $specialities->save();
        return response()->json(['success' => true, 'message' => 'Specialities has been updated.', 'data' => []], 200);
    }
    public function destroy($id)
    {
        $specialities = Specialities::findOrFail($id);
        $specialities_content = SpecialitiesContent::where('specialities_id', $specialities->id)->delete();

        $path = storage_path('app/public/uploads/specialities/' . "$specialities->slug/");
        File::deleteDirectory($path);

        if ($specialities->delete()) {
            return response()->json(['success' => true, 'message' => 'Specialities has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
    public function status($id)
    {
        $specialities = Specialities::findOrFail($id);
        $specialities->is_show = !$specialities->is_show;
        $specialities->save();
        return response()->json(['success' => true, 'message' => 'Specialities status change sucessfully.', 'data' => []], 200);
    }

    public function content($count, $content_type)
    {
        $returnHTML = view('admin.pages.specialities.content')->with('count', $count)->with('content_type', $content_type)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML, 'content_type' => $content_type));
    }
    public function content_delete($id)
    {
        $content = SpecialitiesContent::findOrFail($id);
        if ($content->content_type == 'image_content' || $content->content_type == 'image') {
            $path = storage_path($content->image_path . $content->image_name);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        if ($content->delete()) {
            return response()->json(['success' => true, 'message' => 'Content has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
