<?php

namespace App\Http\Controllers\Admin\Form_Builder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\FormBuilder;

class FormBuilderController extends Controller
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
        return view('admin.pages.form_builder.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.form_builder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'form_name' => 'required|max:30',
        // ]);


        // if ($validator->fails()) {
        //     return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        // }

        $add_form_bulider_form = new FormBuilder();
        $add_form_bulider_form->form_name = $request->form_name_check;
        $add_form_bulider_form->form_details = $request->form_details;

        if ($add_form_bulider_form->save()) {
            return response()->json(['success' => true, 'message' => 'Data added sucessfully.', 'data' => $add_form_bulider_form], 200);
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
        $form_details = FormBuilder::find($id);

        return view('admin.pages.form_builder.edit', compact('form_details'));
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
        // $validator = Validator::make($request->all(), [
        //     'form_name' => 'required|max:30',
        // ]);


        // if ($validator->fails()) {
        //     return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        // }

        $find_form = FormBuilder::findOrFail($id);
        $find_form->form_name = $request->form_name_check;
        $find_form->form_details = $request->form_details;
        $find_form->save();


        return response()->json(['success' => true, 'message' => 'Data updated sucessfully.', 'data' => $find_form], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function form_list()
    {
        $data = FormBuilder::get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function (FormBuilder $data) {
                $edit_link = '<a title="View Details" href="' . route('admin.form_builder.edit', [$data->id]) . '" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light">' .
                    '<i class="fa fa-eye"></i>' .
                    '</a>';

                return  $edit_link;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
