<?php

namespace App\Http\Controllers\Admin\Specialities;

use App\Http\Controllers\Controller;
use App\Models\Specialities;
use Illuminate\Http\Request;
use App\Models\SpecialitiesContent;
use Illuminate\Support\Facades\File;

class SpecialitiesImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function store(Request $request, $specialities_id)
    {
        // dd("store");
        $image = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $specialities = Specialities::findOrFail($specialities_id);
        // $file_name = $filename . '-' . time() . '.' . $extension;
        $file_name = random_int(1000000000, 9999999999) . '.' . $request->file->extension();
        $image->storeAs('public/uploads/specialities/' . $specialities->slug, $file_name);

        $imageUpload = new SpecialitiesContent();
        $imageUpload->specialities_id = $specialities_id;
        $imageUpload->content_type = 'multipal_image';
        $imageUpload->image_path = 'app/public/uploads/specialities/' . $specialities->slug . "/";
        $imageUpload->image_name = $file_name;
        $imageUpload->save();
        return response()->json(['success' => $file_name]);
    }

    public function all(Request $request)
    {
        // dd($request->specialities_id);
        $specialities_id = $request->specialities_id;
        $data = array();
        $images = SpecialitiesContent::where('content_type', 'multipal_image')->where('specialities_id', $specialities_id)->get()->toArray();
        // dd($images);
        foreach ($images as $image) {
            $img = str_replace("/public", "", url('/')) . '/storage/' . $image['image_path'] . $image['image_name'];
            // dd($img);
            $obj['image_name'] = $image['image_name'];
            // $obj['size'] = getimagesize($img);
            $obj['image_path'] = $img;
            $data[] = $obj;
        }
        // dd($data);
        return response()->json($data);
    }


    public function delete(Request $request)
    {
        // dd($request->get('filename'));
        $specialities_id = $request->specialities_id;
        $filename =  $request->get('filename');
        $specialities = Specialities::findOrFail($specialities_id);
        if ($filename == 'all') {
            // dd("in");
            $images = SpecialitiesContent::where('content_type', 'multipal_image')->where('specialities_id', $specialities_id)->get();
            if ($images) {
                foreach ($images as $image) {
                    // dd($image->image_name);
                    SpecialitiesContent::where('image_name', $image->image_name)->where('specialities_id', $specialities_id)->delete();
                    $path = storage_path('app/public/uploads/specialities/' . $specialities->slug . "/" . $image->image_name);
                    if (File::exists($path)) {
                        File::delete($path);
                    }
                }
            }
        } else {
            // dd("out");
            SpecialitiesContent::where('image_name', $filename)->where('specialities_id', $specialities_id)->delete();
            $path = storage_path('app/public/uploads/specialities/' . $specialities->slug . "/" . $filename);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        return response()->json(['success' => $filename]);
    }

    public function editor(Request $request)
    {
        dd("editor");
        if ($request->hasFile('file')) {
            $image_name = time() . '.' . $request->file->getClientOriginalExtension();
            $img = $request->file->storeAs('image', $image_name, 'public');
            if ($img) {
                return response()->json(['file_path' => asset('storage/' . $img)]);
            }
        }
    }
}
