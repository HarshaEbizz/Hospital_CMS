<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use  \Illuminate\Support\Str;
use Auth;

class TermsConditionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.cms.terms_and_condition.index');
    }
    public function list()
    {
        $data = TermsCondition::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('description', function (TermsCondition $term) {
                $desc = strip_tags(html_entity_decode($term->description));
                $description = Str::limit($desc, 100);
                return $description;
            })
            ->addColumn('status', function (TermsCondition $term) {
                if ($term->is_show == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $term->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $term->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (TermsCondition $term) {

                $edit_link = ' <a href="' . route('admin.terms_and_condition.edit', [$term->id]) . '"  type="button" class="btn btn-primary btn-icon-text edit_term" value="' . $term->id . '"> <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_term"  href="' . route('admin.terms_and_condition.destroy', [$term->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                // $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_term" value="' . $term->id . '"> <i class="fa fa-solid fa-trash"></i></button>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['description','status', 'actions'])
            ->toJson();
    }
    public function create()
    {
        return view('admin.pages.cms.terms_and_condition.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $term = new TermsCondition();
        $term->title = "Terms And Conditions";
        $term->sub_title = $request->sub_title;
        $term->description = $request->description;
        if ($request->is_show == "on") {
            $term->is_show = 1;
        } else {
            $term->is_show = 0;
        }
        if ($term->save()) {
            return response()->json(['success' => true, 'message' => 'Condition added Sucessfully.', 'data' => $term], 200);
        }
    }
    public function edit($id)
    {
        $term = TermsCondition::findOrFail($id);
        return view('admin.pages.cms.terms_and_condition.edit',compact('term'));
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'sub_title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $term = TermsCondition::findOrFail($id);
        $term->sub_title = $request->sub_title;
        $term->description = $request->description;
        if ($request->is_show == "on") {
            $term->is_show = 1;
        } else {
            $term->is_show = 0;
        }
        $term->save();
        return response()->json(['success' => true, 'message' => 'Conditions updated Sucessfully.', 'data' => $term], 200);
    }
    public function destroy($id)
    {
        $term = TermsCondition::findOrFail($id);
        if ($term->delete()) {
            return response()->json(['success' => true, 'message' => 'Condition has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
    public function status($id)
    {
        $term = TermsCondition::findOrFail($id);
        if ($term->is_show == "1") {
            $term->is_show = "0";
            $term->save();
        } else {
            $term->is_show = "1";
            $term->save();
        }
        return response()->json(['success' => true, 'message' => 'Condition status change sucessfully.', 'data' => []], 200);
    }
}
