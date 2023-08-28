<?php

namespace App\Http\Controllers\Admin\Goverment_Schemes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\GovermentScheme;
use Illuminate\Support\Facades\File;

class GovermentSchemesController extends Controller
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
        return view('admin.pages.goverment_scheme.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.goverment_scheme.create');
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
            'scheme_name' => 'required|max:10000',
            'scheme_image' => 'required|max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
            'title_1' => 'max:100',
            'title_2' => 'max:100',
        ]);


        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $add_scheme = new GovermentScheme();
        $add_scheme->scheme_name = $request->input('scheme_name');
        $add_scheme->scheme_note = $request->input('scheme_note');
        $add_scheme->storage_path = 'app/public/uploads/goverment_scheme/';
        $add_scheme->title_1 = $request->input('title_1');
        $add_scheme->note_1 = $request->input('note_1');
        $add_scheme->details_1 = $request->input('details_1');
        $add_scheme->title_2 = $request->input('title_2');
        $add_scheme->details_2 = $request->input('details_2');

        if ($request->hasFile('scheme_image')) {
            $add_scheme->scheme_image = $this->crop_image_url($request->scheme_image_url, 'public/uploads/goverment_scheme/');
        }

        if ($add_scheme->save()) {
            return response()->json(['success' => true, 'message' => 'Data added sucessfully.', 'data' => $add_scheme], 200);
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
        $scheme_details = GovermentScheme::find($id);
        return view('admin.pages.goverment_scheme.edit', compact('scheme_details'));
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
        $validator = Validator::make($request->all(), [
            'scheme_name' => 'required|max:10000',
            'scheme_image' => 'max:10000|mimes:jpg,jpeg,png,ico,bmp,gif,svg',
            'title_1' => 'max:100',
            'title_2' => 'max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $update_scheme = GovermentScheme::findOrFail($id);
        $update_scheme->scheme_name = $request->input('scheme_name');
        $update_scheme->scheme_note = $request->input('scheme_note');
        $update_scheme->storage_path = 'app/public/uploads/goverment_scheme/';
        $update_scheme->title_1 = $request->input('title_1');
        $update_scheme->note_1 = $request->input('note_1');
        $update_scheme->details_1 = $request->input('details_1');
        $update_scheme->title_2 = $request->input('title_2');
        $update_scheme->details_2 = $request->input('details_2');

        if ($request->hasFile('scheme_image')) {
            $path = storage_path('app/public/uploads/goverment_scheme/' . $update_scheme->scheme_image);

            if (File::exists($path)) {
                File::delete($path);
            }
            $update_scheme->scheme_image = $this->crop_image_url($request->scheme_image_url, 'public/uploads/goverment_scheme/');
        } else {
            $update_scheme->scheme_image = $update_scheme->scheme_image;
        }

        $update_scheme->save();

        return response()->json(['success' => true, 'message' => 'Data updated sucessfully.', 'data' => $update_scheme], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scheme = GovermentScheme::findOrFail($id);
        $path = storage_path('app/public/uploads/goverment_scheme/' . $scheme->scheme_image);

        if (File::exists($path)) {
            File::delete($path);
        }
        if ($scheme->delete()) {
            return response()->json(['success' => true, 'message' => 'Goverment Scheme has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }

    public function scheme_list()
    {
        $data = GovermentScheme::get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('photo', function (GovermentScheme $data) {
                $img = str_replace("/public", "", url('/')) . '/storage/' . $data->storage_path . $data->scheme_image;
                return '<img src="' . $img . '" style="width: 350px;height:100px;object-fit: contain;">';
            })
            ->addColumn('status', function (GovermentScheme $data) {
                if ($data->active == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (GovermentScheme $data) {
                if ($data->isActivate()) {
                    $button = 'success';
                    $text = 'Deactivate';
                    $title = 'You want to deactivate this scheme?';
                    $icon = '<i class="fa fa-unlock"></i>';
                } else {
                    $button = 'danger';
                    $text = 'Activate';
                    $title = 'You want to activate this scheme?';
                    $icon = '<i class="fa fa-lock"></i>';
                }

                // $as_Activate = "<a title='{$text} scheme' href='" . route('admin.goverment_scheme.activate.toggle', [$data->id]) . "' data-title='{$title}' class='activate-link btn btn-icon btn-outline-{$button} mr-1 mb-1 waves-effect waves-light'> {$icon} </a>";

                // $edit_link = '<a title="View Details" href="' . route('admin.goverment_scheme.edit', [$data->id]) . '" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light"> <i class="fa fa-eye"></i> </a>';

                // $delete_link = '<a title="Delete event" href="' . route('admin.goverment_scheme.destroy', [$data->id]) . '" class="delete-link btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light"> <i class="fa fa-trash"></i> </a>';

                $edit_link = '<a title="View scheme" href="' . route('admin.goverment_scheme.edit', [$data->id]) . '" class="btn btn-primary btn-icon-text edit_tieup_data">' . '<i class="fa fa-pencil"></i>' . '</a>';

                $delete_link = '<a title="Delete scheme" href="' . route('admin.goverment_scheme.destroy', [$data->id]) . '" class="delete-link btn btn-danger btn-icon-text">' . '<i class="fa fa-trash"></i>' . '</a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['actions', 'photo', 'status'])
            ->make(true);
    }

    public function activateToggle(GovermentScheme $scheme)
    {
        if ($scheme->activateToggle()->save()) {
            return response()->json(['success' => true, 'message' => 'Scheme activate status changed.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
}
