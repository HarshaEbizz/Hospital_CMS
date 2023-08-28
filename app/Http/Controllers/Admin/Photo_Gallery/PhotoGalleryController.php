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


class PhotoGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function uniqueSlug($name)
    {
        $slug = Str::slug($name, '_');
        $count = PhotoGallery::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? $count++ : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
    public function index()
    {
        return view('admin.pages.photo_gallery.index');
    }
    public function create()
    {
        return view('admin.pages.photo_gallery.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:photo_galleries',
            'description' => 'required',
            'date' => 'required',
            'main_image' => 'required|mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $gallery = new PhotoGallery();
        $gallery->name = $request->name;
        $gallery->slug = $this->uniqueSlug($request->name);
        $gallery->description = $request->description;
        $gallery->date = $request->date;
        $gallery->image_path = 'app/public/uploads/gallery/';
        if ($request->hasfile('main_image')) {
            $gallery->main_image = $this->crop_image_url($request->main_image_url, 'public/uploads/gallery/');
        }
        if ($gallery->save()) {
            return response()->json(['success' => true, 'message' => 'Photo details Added sucessfully.'], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }
    public function list()
    {
        $data = PhotoGallery::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function (PhotoGallery $gallery) {
                // return '<button type="button" class="btn btn-info add_images_btn" value="' . $gallery->id . '" >Add Image</button>';
                return '<a href="' . route('admin.photo_gallery.edit', [$gallery->id]) . '"  type="button" class="btn btn-info edit_term" value="' . $gallery->id . '">
            Add Image</a>';
            })
            ->addColumn('status', function (PhotoGallery $gallery) {
                if ($gallery->status == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
            data-offstyle="danger" value="' . $gallery->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
            data-offstyle="danger" value="' . $gallery->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (PhotoGallery $gallery) {

                // $edit_link = '  <a href="' . route('admin.photo_gallery.edit', [$gallery->id]) . '"  type="button" class="btn btn-primary btn-icon-text edit_term" value="' . $gallery->id . '">
                // <i class="fa fa-solid fa-pencil"></i></a>';
                $edit_link = '';

                // $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_gallery" value="' . $gallery->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $delete_link = '<a class="btn btn-danger btn-icon-text delete_gallery"  href="' . route('admin.photo_gallery.destroy', [$gallery->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['image', 'status', 'actions'])
            ->toJson();
    }
    public function edit($id)
    {
        $gallery = PhotoGallery::findOrFail($id);
        return view('admin.pages.photo_gallery.edit', compact('gallery'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'main_image' => 'mimes:jpeg,jpg,png,gif,jfif',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $gallery = PhotoGallery::findOrFail($id);
        if ((trim($gallery->name) != trim($request->name))) {
            $gallery->slug = $this->uniqueSlug($request->name);
        }
        $gallery->name = $request->name;
        $gallery->description = $request->description;
        $gallery->date = $request->date;
        $gallery->image_path = 'app/public/uploads/gallery/';
        if ($request->hasfile('main_image')) {
            $path = storage_path('app/public/uploads/gallery/' . $gallery->main_image);
            if (File::exists($path)) {
                File::delete($path);
            }
            $gallery->main_image = $this->crop_image_url($request->main_image_url, 'public/uploads/gallery/');
        }
        if ($gallery->save()) {
            return response()->json(['success' => true, 'message' => 'Photo details Added sucessfully.'], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }
    public function status($id)
    {
        $gallery = PhotoGallery::findOrFail($id);
        $gallery->status = !$gallery->status;
        $gallery->save();
        return response()->json(['success' => true, 'message' => 'Gallery status change sucessfully.', 'data' => []], 200);
    }
    public function destroy($id)
    {
        $gallery = PhotoGallery::with('Images')->findOrFail($id);
        $PhotoGalleryImages = PhotoGalleryImages::where('gallery_id',$gallery->id)->delete();

        $path = storage_path('app/public/uploads/gallery/' . $gallery->main_image);
        if (File::exists($path)) {
            File::delete($path);
        }

        $path = storage_path('app/public/uploads/gallery/' . "$gallery->id/");
        File::deleteDirectory($path);
        if ($gallery->delete()) {
            return response()->json(['success' => true, 'message' => 'Gallery has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
