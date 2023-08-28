<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsAndUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class NewsAndUpdatesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.news_updates');
    }
    public function show($id)
    {
        $news_updates = NewsAndUpdate::findOrFail($id);
        if ($news_updates) {
            return response()->json(['success' => true, 'message' => 'News and Update details.', 'data' => $news_updates], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong.", 'data' => []], 200);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $news_updates = new NewsAndUpdate;
        $news_updates->title = $request->title;
        if ($request->description) {
            $news_updates->description = $request->description;
        }
        $news_updates->posted_date = date('Y-m-d', strtotime($request->posted_date));
        $news_updates->year = date('Y', strtotime($request->posted_date));
        $news_updates->image_path = 'app/public/uploads/news_updates/';
        if ($request->hasfile('image')) {
            $news_updates->image_name = $this->crop_image_url($request->image_url, 'public/uploads/news_updates/');
        }
        if ($news_updates->save()) {
            return response()->json(['success' => true, 'message' => 'News and Media added sucessfully.'], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong.", 'data' => []], 200);
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $news_updates = NewsAndUpdate::find($request->id);
        if ($news_updates) {
            $news_updates->title = $request->title;
            if ($request->description) {
                $news_updates->description = $request->description;
            }
            $news_updates->posted_date = date('Y-m-d', strtotime($request->posted_date));
            $news_updates->year = date('Y', strtotime($request->posted_date));
            $news_updates->image_path = 'app/public/uploads/news_updates/';
            if ($request->hasfile('image')) {
                $path = storage_path($news_updates->image_path . $news_updates->image_name);
                if (File::exists($path)) {
                    File::delete($path);
                }
                $news_updates->image_name = $this->crop_image_url($request->edit_image_url, 'public/uploads/news_updates/');
            }
            if ($news_updates->save()) {
                return response()->json(['success' => true, 'message' => 'News/Updates updated sucessfully.'], 200);
            } else {
                return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
            }
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }

    public function list()
    {
        $data = NewsAndUpdate::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function (NewsAndUpdate $record) {
                $image_name = str_replace("/public", "", url('/')) . '/storage/' . $record->image_path . $record->image_name;
                return '<img src="' . $image_name . '" style="height:75px;">';
            })
            ->addColumn('actions', function (NewsAndUpdate $record) {

                $action_link = '<a href="' . route('admin.news_and_updates.show', [$record->id]) . '"  type="button" class="btn btn-primary btn-icon-text edit_news_update" data-id="' . $record->id . '"> <i class="fa fa-solid fa-pencil"></i></a> <a class="btn btn-danger btn-icon-text delete_news_update"  href="' . route('admin.news_and_updates.destroy', [$record->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $action_link;
            })
            ->rawColumns(['image', 'actions'])
            ->make(true);
    }
    
    public function destroy($id)
    {
        $news_updates = NewsAndUpdate::findOrFail($id);
        $path = storage_path($news_updates->image_path . $news_updates->image_name);
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($news_updates->delete()) {
            return response()->json(['success' => true, 'message' => 'News and Update has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
}
