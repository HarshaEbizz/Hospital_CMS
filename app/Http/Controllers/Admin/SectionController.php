<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Response;
use Auth;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.sections.index');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'section_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $section = new Section;
        $section->section_name = $request->section_name;
        if($section->save())
        {
            return response()->json(['success' => true, 'message' => 'Section Added sucessfully.'], 200);
        }
        else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong."], 202);
        }
    }
    public function list()
    {
        $data = Section::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function (Section $section) {
                // $action_link = '<button type="button" class="btn btn-primary btn-icon-text edit_section" value="' . $section->id . '"><i class="fa fa-solid fa-pencil"></i></button>  <button type="button" class="btn btn-danger btn-icon-text delete_section" value="' . $section->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                $action_link = ' <a class="btn btn-primary btn-icon-text edit_section" href="' . route('admin.sections.show', [$section->id]) . '"> <i class="fa fa-solid fa-pencil"></i></a> <a  class="btn btn-danger btn-icon-text delete_section"  href="' . route('admin.sections.destroy', [$section->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $action_link;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function show($id)
    {
        $section = Section::findOrFail($id);
        if ($section) {
            return response()->json(['success' => true, 'message' => 'Section details.', 'data' => $section], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Something went wrong.", 'data' => []], 200);
        }
    }
    public function update_section(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'section_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $section = Section::findOrFail($request->id);
        if($section)
        {
            $section->section_name = $request->section_name;
            if($section->save())
            {
                return response()->json(['success' => true, 'message' => 'Section updated sucessfully.'], 200);
            }
            else{
                return response()->json(['success' => false, 'message' => 'Something went wrong.'], 202);
            }
        }
        else{
            return response()->json(['success' => false, 'message' => 'Something went wrong.'], 202);
        }
    }
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        if ($section->delete()) {
            return response()->json(['success' => true, 'message' => 'Section has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Somthing went wrong.", 'data' => []], 200);
        }
    }
}
