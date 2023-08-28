<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cluster;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ClusterController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.cluster');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cluster' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $cluster = new Cluster();
        $cluster->cluster = $request->cluster;
        if ($cluster->save()) {
            return response()->json(['success' => true, 'message' => 'Cluster Added sucessfully.'], 200);
        }
    }
    public function list()
    {
        $data = Cluster::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function (Cluster $cluster) {
                if ($cluster->status == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $cluster->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="status" name="status" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $cluster->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (Cluster $cluster) {
                // $edit_link = ' <button type="button" class="btn btn-primary btn-icon-text edit_cluster" value="' . $cluster->id . '">
                // <i class="fa fa-solid fa-pencil"></i></button>';

                // $delete_link = '<button type="button" class="btn btn-danger btn-icon-text delete_cluster" value="' . $cluster->id . '">
                // <i class="fa fa-solid fa-trash"></i></button>';

                $edit_link = ' <a class="btn btn-primary btn-icon-text edit_cluster" data-id="' . $cluster->id . '">
                <i class="fa fa-solid fa-pencil"></i></a>';

                $delete_link = '<a  class="btn btn-danger btn-icon-text delete_cluster"  href="' . route('admin.cluster.destroy', [$cluster->id]) . '">
                <i class="fa fa-solid fa-trash"></i></a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['status', 'actions'])
            ->toJson();
    }
    public function edit($id)
    {
        $cluster = Cluster::findOrFail($id);
        return response()->json($cluster);
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'edit_cluster' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        $cluster = Cluster::findOrFail($id);
        $cluster->cluster = $request->edit_cluster;
        if ($cluster->save()) {
            return response()->json(['success' => true, 'message' => 'Cluster Updated sucessfully.'], 200);
        }
    }
    public function destroy($id)
    {
        $cluster = Cluster::findOrFail($id);
        if ($cluster->delete()) {
            return response()->json(['success' => true, 'message' => 'Cluster has been deleted.', 'data' => []], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
        }
    }
    public function status($id)
    {
        $cluster = Cluster::findOrFail($id);
        $cluster->status = !$cluster->status;
        $cluster->save();
        return response()->json(['success' => true, 'message' => 'Cluster status change sucessfully.', 'data' => []], 200);
    }
}
