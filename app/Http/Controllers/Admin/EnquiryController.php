<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class EnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.pages.enquiry_data');
    }
    public function list()
    {
        $data = Enquiry::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('contact', function (Enquiry $enquiry) {
                return "+".$enquiry->country_code."  ".$enquiry->help_contact;
            })
            ->addColumn('view', function (Enquiry $enquiry) {
                return '<a title="View Details" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light view_enquiery_data" data-id="' . $enquiry->id . '">' .
                '<i class="fa fa-eye"></i>' .
                '</a>';
            })
            ->rawColumns(['contact','view'])
            ->toJson();
    }
    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        return response()->json($enquiry);
    }
}
