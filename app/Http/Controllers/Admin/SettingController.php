<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.pages.settings.index');
    }

    /**
     * Listing a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Setting::where('setting_key', '!=', 'HOSPITAL_LOGO')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function (Setting $setting) {

                if ($setting->status == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $setting->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $setting->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (Setting $setting) {
                // $action_link = '<button type="button" class="btn btn-primary btn-icon-text edit_setting" value="' . $setting->id . '"> <i class="fa fa-solid fa-pencil"></i>' . '</button>' . '<button type="button" class="btn btn-danger btn-icon-text delete_setting" value="' . $setting->id . '">' . '<i class="fa fa-solid fa-trash"></i>' . '</button>';

                $action_link = ' <a class="btn btn-primary btn-icon-text edit_setting" href="' . route('admin.setting.edit', [$setting->id]) . '" data-id="' . $setting->id . '"> <i class="fa fa-solid fa-pencil"></i></a> <a  class="btn btn-danger btn-icon-text delete_setting"  href="' . route('admin.setting.destroy', [$setting->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';
                return $action_link;
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'setting_key' => 'required',
            'setting_value' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $setting = Setting::create(
            $request->only('setting_key', 'setting_value')
        );

        if ($setting) {
            return response()->json(['success' => true, 'message' => 'Setting added successfully.'], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong."], 202);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::where('id', $id)->first();
        return response()->json($setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->setting_key == 'HOSPITAL_LOGO') {
            $setting = Setting::findOrFail($id);
            if($request->hasfile('logo')){
                $fileName = random_int(1000000000, 9999999999) . '.' . $request->logo->extension();
                $request->logo->storeAs('public/uploads/hospital_logo/',$fileName);
                $setting->setting_value = 'app/public/uploads/hospital_logo/'.$fileName;
            }
            $setting->setting_key = $request->setting_key;
            if($request->status=="on"){
                $setting->status = 1;
            }else{
                $setting->status = 0;
            }
            if($setting->save())
            {
                return response()->json(['success' => true, 'message' => 'Hospital Logo added sucessfully.'], 200);
            }
        }
        $validator = Validator::make($request->all(), [
            'setting_key' => 'required',
            'setting_value' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $setting = Setting::where('id', $id)->update(
            $request->only('setting_key', 'setting_value')
        );

        if ($setting) {
            return response()->json(['success' => true, 'message' => 'Setting updated successfully.'], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong."], 202);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        if ($setting->delete()) {
            return response()->json(['success' => true, 'message' => 'Setting has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }

    public function change_status($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->status = !$setting->status;
        if ($setting->save()) {
            return response()->json(['success' => true, 'message' => 'Setting status changed successfully.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Setting status changed successfully.', 'data' => []], 200);
        }
    }
    public function upadte_hospital_logo(Request $request)
    {
        // dd($request);
    }
}
