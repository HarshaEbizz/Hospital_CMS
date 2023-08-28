<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\ContactUsInquiry;
use Yajra\DataTables\DataTables;
use App\Models\ContactUsContains;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Specialities;
use Auth;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
        \View::share('specialities',Specialities::orderby('id')->get());
        \View::share('country',Country::orderby('name')->get());
        \View::share('state',State::orderby('name')->get());
    }

    public function index()
    {
        return view('admin.pages.contact_us.manage_contact_page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Contact Inquirys List */
    public function create()
    {
        return view('admin.pages.contact_us.inquiry_view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $profile_details = DoctorProfile::find($doctor->id);
        $details = ContactUsContains::find($id);

        return response()->json($details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /*Update Contact Contain*/
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'phone_number' => 'required',
            'opening_timing' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $update_record = $request->all();

        ContactUsContains::find($id)->update($update_record);

        return response()->json(['success' => true, 'message' => 'Record updated sucessfully.', 'data' => $update_record], 200);
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





    public function list()
    {
        $data = ContactUsContains::all();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function (ContactUsContains $data) {
                // $edit_link = '<a title="View Details" href="' . route('admin.contact_us.show', [$data->id]) . '" data-id="'.$data->id.'" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light" data-bs-toggle="modal"  data-whatever="@mdo" data-bs-original-title=""> <i class="fa fa-eye"></i> </a>';

                $edit_link = '<a title="View Details" href="' . route('admin.contact_us.show', [$data->id]) . '" data-id="'.$data->id.'" class="btn btn-primary btn-icon-text edit-link" data-bs-toggle="modal"  data-whatever="@mdo" data-bs-original-title="">' . '<i class="fa fa-pencil"></i>' . '</a>';

                return $edit_link ;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function inquirys_list()
    {
        $data = ContactUsInquiry::with(['country','state','speciality'])->latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('full_name', function (ContactUsInquiry $data) {
                return $data->first_name . " ". $data->last_name;
            })
            ->addColumn('mobile_no', function (ContactUsInquiry $data) {
                return '+' . $data->country_code . "-". $data->mobile_no;
            })
            ->addColumn('country_name', function (ContactUsInquiry $data) {
                return $data->country->name;
            })
            ->addColumn('state_name', function (ContactUsInquiry $data) {
                return $data->state->name;
            })
            ->addColumn('speciality', function (ContactUsInquiry $data) {
                return $data->speciality->name;
            })
            ->addColumn('actions', function (ContactUsInquiry $data) {
                $edit_link = '<a title="View Details" href="' . route('admin.inquiry.show', [$data->id]) . '" data-id="'.$data->id.'" class="edit-link btn btn-icon btn-outline-primary mr-1 mb-1 waves-effect waves-light" data-bs-toggle="modal"  data-whatever="@mdo" data-bs-original-title="">' .
                '<i class="fa fa-eye"></i>' .
                '</a>';

                return $edit_link ;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function inquirys_show($id)
    {
        $details = ContactUsInquiry::with(['country','state','speciality'])->find($id);

        // dd($details);
        return response()->json($details);
    }
}
