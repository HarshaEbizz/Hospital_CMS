<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Auth;

class FAQController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.cms.faq');
    }


    public function list()
    {
        $data = Faq::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function (Faq $faq) {

                if ($faq->is_show == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $faq->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $faq->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (Faq $faq) {

                $edit_link = ' <a type="button" class="btn btn-primary btn-icon-text edit_faq" href="' . route('admin.faq.edit', [$faq->id]) . '"> <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_faq"  href="' . route('admin.faq.destroy', [$faq->id]) . '"> <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['status', 'actions'])
            ->toJson();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        if ($request->is_show == "on") {
            $faq->is_show = 1;
        } else {
            $faq->is_show = 0;
        }
        if ($faq->save()) {
            return response()->json(['success' => true, 'message' => 'FAQ added Sucessfully.', 'data' => $faq], 200);
        }
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $faq = Faq::where('id', $id)->first();
        return response()->json($faq);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'edit_question' => 'required',
            'edit_answer' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $faq = Faq::findOrFail($id);
        $faq->question = $request->edit_question;
        $faq->answer= $request->edit_answer;
        $faq->save();
        return response()->json(['success' => true, 'message' => 'FAQ updated Sucessfully.', 'data' => []], 200);
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        if ($faq->delete()) {
            return response()->json(['success' => true, 'message' => 'FAQ has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
    public function faq_status($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->is_show = !$faq->is_show;
        $faq->save();
        return response()->json(['success' => true, 'message' => 'FAQ status change sucessfully.', 'data' => []], 200);
    }
}
