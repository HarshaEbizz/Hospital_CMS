<?php

namespace App\Http\Controllers\Admin\Photo_Gallery;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use App\Models\PhotoGalleryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use  \Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;


class GalleryImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function store(Request $request, $gallery_id)
    {
        $image = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name = $filename . '-' . time() . '.' . $extension;
        $image->storeAs('public/uploads/gallery/' . $gallery_id, $file_name);

        $imageUpload = new PhotoGalleryImages();
        $imageUpload->gallery_id = $gallery_id;
        $imageUpload->name = $file_name;
        $imageUpload->path = 'app/public/uploads/gallery/' . $gallery_id . "/";
        $imageUpload->save();
        return response()->json(['success' => $file_name]);
    }

    public function all(Request $request)
    {
        $gallery_id = $request->gallery_id;
        $data = array();
        $images = PhotoGalleryImages::where('gallery_id', $gallery_id)->where('name', '!=', '')->get()->toArray();

        foreach ($images as $image) {
            $img = str_replace("/public", "", url('/')) . '/storage/' . $image['path'] . $image['name'];
            $obj['name'] = $image['name'];
            // $obj['size'] = getimagesize($img);
            $obj['path'] = $img;
            $data[] = $obj;
        }
        // dd($data);
        return response()->json($data);
    }


    public function delete(Request $request)
    {
        $gallery_id = $request->gallery_id;
        $filename =  $request->get('filename');
        PhotoGalleryImages::where('gallery_id', $gallery_id)->where('name', $filename)->delete();
        $path = storage_path('app/public/uploads/gallery/' . $gallery_id . "/" . $filename);
        if (File::exists($path)) {
            File::delete($path);
        }
        return response()->json(['success' => $filename]);
    }

    public function editor(Request $request)
    {
        dd($request);
        if ($request->hasFile('file')) {
            $image_name = time() . '.' . $request->file->getClientOriginalExtension();
            $img = $request->file->storeAs('image', $image_name, 'public');
            if ($img) {
                return response()->json(['file_path'=>asset('storage/' . $img)]);
            }
        }
    }
}
