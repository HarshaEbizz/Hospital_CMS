<?php

namespace App\Http\Controllers\Admin\Health;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\HealthInformation;
use App\Models\HealthInformationContent;

class HealthController extends Controller
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
       // $health = HealthInformation::where('info_type', 'tip')->first();

        // return view('admin.pages.health.health_tip_index', compact('health'));
        $health_details = HealthInformation::where('info_type', 'tip')->first();
        $health = HealthInformation::where('info_type', 'tip')->first();

        $this->data['health_details'] = $health_details;
        $this->data['health'] = $health;

        return view('admin.pages.health.index')->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $health = HealthInformation::where('info_type', 'tip')->first();
        return view('admin.pages.health.create', compact('health'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'title_1' => 'max:100',
            'title_2' => 'max:100',
            'title_3' => 'max:100',
            'info_type' => 'required',
            'cover_image' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
            'document' => 'max:10000|mimes:jpg,jpeg,png,pdf',
        ]);


        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $add_info = new HealthInformation();
        $add_info->title_1 = $request->input('title_1');
        $add_info->info_type = $request->input('info_type');
        $add_info->details_1 = $request->input('details_1');
        $add_info->storage_path = 'app/public/uploads/health_information/';
        $add_info->title_2 = $request->input('title_2');
        $add_info->details_2 = $request->input('details_2');
        $add_info->title_3 = $request->input('title_3');
        $add_info->details_3 = $request->input('details_3');

        if ($request->hasFile('cover_image')) {
            $add_info->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/health_information/');
        }

        if ($request->hasFile('document')) {
            $fileName = time().'.'.$request->document->extension();
            $request->document->storeAs('public/uploads/health_information', $fileName);
            $add_info->document = $fileName;
        }

        if ($add_info->save()) {
            return response()->json(['success' => true, 'message' => 'Data added sucessfully.', 'data' => $add_info], 200);
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
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $health_details = HealthInformation::find($id);
        return response()->json($health_details);
        // $health = HealthInformation::where('info_type', 'tip')->first();
        // return view('admin.pages.health.edit', compact('health_details', 'health'));
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
        // dd($request->input('info_type'));
        if ($request->input('info_type') =='compliance') {
            $validator = Validator::make($request->all(), [
                'edit_title_1' => 'required|max:100',
                'edit_document' => 'max:10000|mimes:jpg,jpeg,png,pdf',
            ]);    
        } else {
            $validator = Validator::make($request->all(), [
                'title_1' => 'max:100',
                'title_2' => 'max:100',
                'title_3' => 'max:100',
                'cover_image' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
                'document' => 'max:10000|mimes:jpg,jpeg,png,pdf',
            ]);
    
        }
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $find_info = HealthInformation::findOrFail($id);
        if ($request->input('info_type')=='compliance') {
            $find_info->title_1 = $request->input('edit_title_1');
            if ($request->hasFile('edit_document')) {
                $path = storage_path('app/public/uploads/health_information/' . $find_info->document);
    
                if (File::exists($path)) {
                    File::delete($path);
                }
    
                $fileName = time().'.'.$request->edit_document->extension();
                $request->edit_document->storeAs('public/uploads/health_information', $fileName);
                $find_info->document = $fileName;
            } else {
                $find_info->document = $find_info->document;
            }
        }else{
            $find_info->title_1 = $request->input('title_1');
            $find_info->info_type = $request->input('info_type');
            $find_info->details_1 = $request->input('details_1');
            $find_info->storage_path = 'app/public/uploads/health_information/';
            $find_info->title_2 = $request->input('title_2');
            $find_info->details_2 = $request->input('details_2');
            $find_info->title_3 = $request->input('title_3');
            $find_info->details_3 = $request->input('details_3');
    
            if ($request->hasFile('cover_image')) {
                $path = storage_path('app/public/uploads/health_information/' . $find_info->cover_image);
    
                if (File::exists($path)) {
                    File::delete($path);
                }
                $find_info->cover_image = $this->crop_image_url($request->cover_image_url, 'public/uploads/health_information/');
            } else {
                $find_info->cover_image = $find_info->cover_image;
            }
        }
       

        $find_info->save();

        return response()->json(['success' => true, 'message' => 'Data updated sucessfully.', 'data' => $find_info], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthInformation $health)
    {
        if ($health->info_type == 'tip') {
            $path = storage_path('app/public/uploads/health_information/' . $health->cover_image);
        } else {
            $path = storage_path('app/public/uploads/health_information/' . $health->document);
        }

        if (File::exists($path)) {
            File::delete($path);
        }

        if ($health->forceDelete()) {
            return response()->json(['success' => true, 'message' => 'Health information has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }

    public function health_tip_list()
    {
        $data = HealthInformation::where('info_type', 'tip')->latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('photo', function (HealthInformation $data) {
                $img = str_replace("/public", "", url('/')) . '/storage/' .$data->storage_path . $data->cover_image;
                return '<img src="' . $img . '" style="width: 150px;height:100px;object-fit: contain;">';
            })
            ->addColumn('status', function (HealthInformation $data) {
                if ($data->active == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (HealthInformation $data) {
                if ($data->isActivate()) {
                    $button = 'success';
                    $text = 'Deactivate';
                    $title = 'You want to deactivate this information?';
                    $icon = '<i class="fa fa-unlock"></i>';
                } else {
                    $button = 'danger';
                    $text = 'Activate';
                    $title = 'You want to activate this information?';
                    $icon = '<i class="fa fa-lock"></i>';
                }

                // $as_Activate = "<a title='{$text} Information' href='" . route('admin.health.activate.toggle', [$data->id]) . "' data-title='{$title}' class='activate-link btn btn-icon btn-outline-{$button} mr-1 mb-1 waves-effect waves-light'> {$icon} </a>";

                // $edit_link = '<a title="View Details" href="' . route('admin.health.edit', [$data->id]) . '" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light"> <i class="fa fa-eye"></i> </a>';

                // $delete_link = '<a title="Delete event" href="' . route('admin.health.destroy', [$data->id]) . '" class="delete-link btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light"> <i class="fa fa-trash"></i> </a>';

                $edit_link = '<a title="View Health Tip" href="' . route('admin.health.edit', [$data->id]) . '" class="btn btn-primary btn-icon-text edit-link">' . '<i class="fa fa-pencil"></i>' . '</a>';

                $delete_link = '<a title="Delete Health Tip" href="' . route('admin.health.destroy', [$data->id]) . '" class="delete-link btn btn-danger btn-icon-text">' . '<i class="fa fa-trash"></i>' . '</a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['actions','photo', 'status'])
            ->make(true);
    }

    public function statutory_compliance_list()
    {
        $data = HealthInformation::where('info_type', 'compliance')->latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            // ->addColumn('photo', function (HealthInformation $data) {
            //     $img = str_replace("/public", "", url('/')) . '/storage/' .$data->image_path . $data->company_logo;
            //     return '<img src="' . $img . '" style="width: 150px;height:100px;">';
            // })
            ->addColumn('status', function (HealthInformation $data) {
                if ($data->active == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (HealthInformation $data) {
                if ($data->isActivate()) {
                    $button = 'success';
                    $text = 'Deactivate';
                    $title = 'You want to deactivate this information?';
                    $icon = '<i class="fa fa-unlock"></i>';
                } else {
                    $button = 'danger';
                    $text = 'Activate';
                    $title = 'You want to activate this information?';
                    $icon = '<i class="fa fa-lock"></i>';
                }

                // $as_Activate = "<a title='{$text} information' href='" . route('admin.health.activate.toggle', [$data->id]) . "' data-title='{$title}' class='activate-link btn btn-icon btn-outline-{$button} mr-1 mb-1 waves-effect waves-light'> {$icon} </a>";

                // $edit_link = '<a title="View Details" href="' . route('admin.health.edit', [$data->id]) . '" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light"> <i class="fa fa-eye"></i> </a>';

                // $delete_link = '<a title="Delete event" href="' . route('admin.health.destroy', [$data->id]) . '" class="delete-link btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light"> <i class="fa fa-trash"></i> </a>';

                $edit_link = '<a title="View Compliance Tip " data-id="' . $data->id . '" class="btn btn-primary btn-icon-text edit-link edit_Compliance">' . '<i class="fa fa-pencil"></i>' . '</a>';

                $delete_link = '<a title="Delete Compliance Tip" data-id="' . $data->id . '"  href="' . route('admin.health.destroy', [$data->id]) . '" class="delete-link btn btn-danger btn-icon-text">' . '<i class="fa fa-trash"></i>' . '</a>';


                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function activateToggle(HealthInformation $health)
    {
        if ($health->activateToggle()->save()) {
            return response()->json(['success' => true, 'message' => 'Health Information activate status changed.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }

    public function statutory_compliance_index()
    {
        return view('admin.pages.health.statutory_compliance_index');
    }

    public function content($count, $title)
    {
        // dd($title);
        $returnHTML = view('admin.pages.health.content')->with('count', $count)->with('title', $title)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }
}
