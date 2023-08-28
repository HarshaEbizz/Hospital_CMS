<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.slider_images');
    }


    public function list()
    {
        $data = HomeSlider::orderby('order')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function (HomeSlider $slider) {

                $img = str_replace("/public", "", url('/')) . '/storage/app/public/uploads/slider_images/' . $slider->image_name;
                return '<img src="' . $img . '" style="height:100px;">';
            })
            ->addColumn('is_show_register', function (HomeSlider $slider) {

                if ($slider->is_show_register == 1) {
                    $status_link = '<input class="tgl register_status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Yes" data-off="No" data-onstyle="success"
                    data-offstyle="danger" value="' . $slider->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl register_status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Yes" data-off="No" data-onstyle="success"
                    data-offstyle="danger" value="' . $slider->id . '">';
                }
                return $status_link;
            })
            ->addColumn('status', function (HomeSlider $slider) {
                if ($slider->status == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $slider->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $slider->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (HomeSlider $slider) {

                // $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_image" value="' . $slider->id . '">
                // <i class="fa fa-solid fa-trash"></i></button>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_image"  href="' . route('admin.slider.destroy', [$slider->id]) . '">
                <i class="fa fa-solid fa-trash"></i></a>';

                return $delete_link;
            })
            ->rawColumns(['is_show_register', 'status', 'image', 'actions'])
            ->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slider_image' => 'required',
            'slider_image.*' => 'mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }


        if ($request->hasfile('slider_image')) {
            foreach ($request->slider_image as $image) {
                $slider = new HomeSlider;
                $fileName = time() . rand(1, 100) . '.' . $image->extension();
                if ($image->storeAs('public/uploads/slider_images', $fileName)) {
                    $slider->image_name = $fileName;
                    $slider->image_path = 'app/public/uploads/slider_images/';
                    $slider->save();
                }
            }
        }
        return response()->json(['success' => true, 'message' => 'Slider image(s) uploaded sucessfully.'], 200);
    }

    public function destroy($id)
    {
        $slider = HomeSlider::findOrFail($id);
        $path = storage_path('app/public/uploads/slider_images/' . $slider->image_name);
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($slider->delete()) {
            return response()->json(['success' => true, 'message' => 'Slider image has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
    public function register_status($id)
    {
        $slider = HomeSlider::findOrFail($id);
        $slider->is_show_register = !$slider->is_show_register;
        if ($slider->save()) {
            return response()->json(['success' => true, 'message' => 'Slider Register Button status changed sucessfully.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Slider Register Button status changed sucessfully.', 'data' => []], 200);
        }
    }
    public function status($id)
    {
        $slider = HomeSlider::findOrFail($id);
        $slider->status = !$slider->status;
        $slider->save();
        return response()->json(['success' => true, 'message' => 'Slider status change sucessfully.', 'data' => []], 200);
    }
    public function order(Request $request)
    {
        // dd($request->order);
        $sliders = HomeSlider::all();
        foreach($sliders as $slider) {
            $slider->timestamps = false;
            $id = $slider->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $slider->update(['order' => $order['position']]);
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'Slider order change sucessfully.', 'data' => []], 200);
    }
}
