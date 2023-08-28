<?php

namespace App\Http\Controllers\Admin\Tieup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\Tieup;
use App\Models\TieupContain;
use Illuminate\Support\Facades\File;

class TieupController extends Controller
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
        // return view('admin.pages.tieup.corporate_tieup_index');

        $corporate_contain = TieupContain::where('contain_for', 'corporate')->first();
        $tpa_contain = TieupContain::where('contain_for', 'tpa')->first();

        $this->data['corporate_contain'] = $corporate_contain;
        $this->data['tpa_contain'] = $tpa_contain;

        return view('admin.pages.tieup.corporate_tieup_index')->with($this->data);
    }

    public function tpa_tieup_index()
    {
        // return view('admin.pages.tieup.corporate_tieup_index');

        $corporate_contain = TieupContain::where('contain_for', 'corporate')->first();
        $tpa_contain = TieupContain::where('contain_for', 'tpa')->first();

        $this->data['corporate_contain'] = $corporate_contain;
        $this->data['tpa_contain'] = $tpa_contain;

        return view('admin.pages.tieup.tpa_tieup_index')->with($this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tieup.create');
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
            'title' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        if ($request->input('contain_for') == 'corporate') {
            $page_contain = TieupContain::where('contain_for', 'corporate')->first();
        } else {
            $page_contain = TieupContain::where('contain_for', 'tpa')->first();
        }

        if (empty($page_contain)) {
            $page_contain = new TieupContain();
            $page_contain->contain_for = $request->input('contain_for');
            $page_contain->title = $request->input('title');
            $page_contain->note = $request->input('note');
        } else {
            $page_contain->contain_for = $request->input('contain_for');
            $page_contain->title = $request->input('title');
            $page_contain->note = $request->input('note');
        }
        $page_contain->save();


        if ($page_contain) {
            return response()->json(['success' => true, 'message' => 'Data added sucessfully.', 'data' => $page_contain], 200);
        }
    }

    public function tieup_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|max:100',
            'company_logo' => 'required|max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
        ]);


        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $add_tieup = new Tieup();
        $add_tieup->company_name = $request->input('company_name');
        $add_tieup->tieup_type = $request->input('tieup_type');

        if ($request->input('tieup_type') == 'corporate') {
            $add_tieup->image_path = 'app/public/uploads/corporate_tieup/';
            $path = 'public/uploads/corporate_tieup/';
        } else {
            $add_tieup->image_path = 'app/public/uploads/tpa_tieup/';
            $path = 'public/uploads/tpa_tieup/';
        }


        if ($request->hasFile('company_logo')) {
            $add_tieup->company_logo = $this->crop_image_url($request->company_logo_url,$path);
        }

        if ($add_tieup->save()) {
            return response()->json(['success' => true, 'message' => 'Data added sucessfully.', 'data' => $add_tieup], 200);
        }
    }

    public function tieup_edit($id)
    {
        $data = Tieup::findOrFail($id);
        return response()->json($data);
    }

    public function tieup_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'edit_company_name' => 'required|max:100',
            'edit_company_logo' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $update_tie_up = Tieup::findOrFail($id);
        $update_tie_up->company_name = $request->edit_company_name;
        // $update_tie_up->image_path = 'app/public/uploads/tieup/';

        if ($request->edit_tieup_type == 'corporate') {
            $update_tie_up->image_path = 'app/public/uploads/corporate_tieup/';
            $path = 'public/uploads/corporate_tieup/';
        } else {
            $update_tie_up->image_path = 'app/public/uploads/tpa_tieup/';
            $path = 'public/uploads/tpa_tieup/';
        }



        if ($request->hasFile('edit_company_logo')) {
            $file_exist = storage_path('app/' . $path . $update_tie_up->company_logo);
            if (File::exists($file_exist)) {
                File::delete($file_exist);
            }
            $update_tie_up->company_logo = $this->crop_image_url($request->edit_company_logo_url,$path);
        }


        if ($update_tie_up->save()) {
            return response()->json(['success' => true, 'message' => 'Data Updated Sucessfully.', 'data' => $update_tie_up], 200);
        }
    }

    public function destroy(Tieup $tieup)
    {
        $path = storage_path($tieup->image_path . $tieup->company_logo);
        if (File::exists($path)) {
            File::delete($path);
        }

        if ($tieup->forceDelete()) {
            return response()->json(['success' => true, 'message' => 'Company Tie-up has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }

    public function corporate_tieup_list()
    {
        $data = Tieup::where('tieup_type', 'corporate')->latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('photo', function (Tieup $data) {
                $img = str_replace("/public", "", url('/')) . '/storage/' . $data->image_path . $data->company_logo;
                return '<img src="' . $img . '" style="width: 150px;height:100px;object-fit: contain;">';
            })
            ->addColumn('status', function (Tieup $data) {
                if ($data->active == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (Tieup $data) {
                if ($data->isActivate()) {
                    $button = 'success';
                    $text = 'Deactivate';
                    $title = 'You want to deactivate this Tie-up?';
                    $icon = '<i class="fa fa-unlock"></i>';
                } else {
                    $button = 'danger';
                    $text = 'Activate';
                    $title = 'You want to activate this Tie-up?';
                    $icon = '<i class="fa fa-lock"></i>';
                }

                $as_Activate = "<a title='{$text} Tie-up' href='" . route('admin.tieup.activate.toggle', [$data->id]) . "' data-title='{$title}' class='activate-link btn btn-icon btn-outline-{$button} mr-1 mb-1 waves-effect waves-light'>" .
                    "{$icon}" .
                    "</a>";

                // $edit_link = '<a title="View Details" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light edit_tieup_data" data-id="'.$data->id.'">' . '<i class="fa fa-eye"></i>' . '</a>';

                // $delete_link = '<a title="Delete event" href="' . route('admin.tieup.destroy', [$data->id]) . '" class="delete-link btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light">' . '<i class="fa fa-trash"></i>' . '</a>';

                $edit_link = '<a title="View Details" href="' . route('admin.tieup_edit', [$data->id]) . '" class="btn btn-primary btn-icon-text edit_tieup_data">' . '<i class="fa fa-pencil"></i>' . '</a>';

                $delete_link = '<a title="Delete event" href="' . route('admin.tieup.destroy', [$data->id]) . '" class="delete-link btn btn-danger btn-icon-text">' . '<i class="fa fa-trash"></i>' . '</a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['actions', 'photo', 'status'])
            ->make(true);
    }

    public function tpa_tieup_list()
    {
        $data = Tieup::where('tieup_type', 'tpa')->latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('photo', function (Tieup $data) {
                $img = str_replace("/public", "", url('/')) . '/storage/' . $data->image_path . $data->company_logo;
                return '<img src="' . $img . '" style="width: 150px;height:100px;object-fit: contain;">';
            })
            ->addColumn('status', function (Tieup $data) {
                if ($data->active == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (Tieup $data) {
                if ($data->isActivate()) {
                    $button = 'success';
                    $text = 'Deactivate';
                    $title = 'You want to deactivate this Tie-up?';
                    $icon = '<i class="fa fa-unlock"></i>';
                } else {
                    $button = 'danger';
                    $text = 'Activate';
                    $title = 'You want to activate this Tie-up?';
                    $icon = '<i class="fa fa-lock"></i>';
                }

                // $as_Activate = "<a title='{$text} Tie-up' href='" . route('admin.tieup.activate.toggle', [$data->id]) . "' data-title='{$title}' class='activate-link btn btn-icon btn-outline-{$button} mr-1 mb-1 waves-effect waves-light'>" . "{$icon}" . "</a>";

                // $edit_link = '<a title="View Details" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light edit_tieup_data" data-id="'.$data->id.'"> <i class="fa fa-eye"></i> </a>';

                // $delete_link = '<a title="Delete event" href="' . route('admin.tieup.destroy', [$data->id]) . '" class="delete-link btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light"> <i class="fa fa-trash"></i> </a>';

                $edit_link = '<a title="View Details" href="' . route('admin.tieup_edit', [$data->id]) . '" class="btn btn-primary btn-icon-text edit_tieup_data">' . '<i class="fa fa-pencil"></i>' . '</a>';

                $delete_link = '<a title="Delete event" href="' . route('admin.tieup.destroy', [$data->id]) . '" class="delete-link btn btn-danger btn-icon-text">' . '<i class="fa fa-trash"></i>' . '</a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['actions', 'photo', 'status'])
            ->make(true);
    }

    public function activateToggle(Tieup $tieup)
    {
        if ($tieup->activateToggle()->save()) {
            return response()->json(['success' => true, 'message' => 'Tie-up activate status changed.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
