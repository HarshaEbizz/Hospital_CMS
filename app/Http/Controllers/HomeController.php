<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Event;
use App\Models\EventForm;
use App\Models\Room;
use App\Models\Wing;
use App\Models\Floor;
use App\Models\Medic;
use App\Models\State;
use App\Models\AboutUs;
use App\Models\Country;
use App\Models\Section;
use App\Models\TestType;
use App\Models\FloorPlan;
use App\Models\ClinicList;
use App\Models\Department;
use App\Models\DoAndDonts;
use App\Models\HomeSlider;
use App\Models\CheckUpPlan;
use App\Models\RoomCategory;
use App\Models\Specialities;
use Illuminate\Http\Request;
use App\Models\ChairmanSpeak;
use App\Models\DoctorProfile;
use App\Models\NewsAndUpdate;
use App\Models\PatientReviews;
use App\Models\VisitingHours;
use App\Models\TermsCondition;
use App\Models\ChairmanMessage;
use App\Models\SpecialityClinic;
use App\Models\VisionAndMission;
use PhpParser\Node\Stmt\Return_;
use App\Models\ContactUsContains;
use App\Models\HospitalTourVideo;
use App\Models\ManagementMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Models\HospitalTourTimeline;
use App\Models\PatientsGuideService;
use App\Models\AchievementCertificates;
use App\Models\Enquiry;
use App\Models\InternationalPatientCare;
use App\Models\InternationalPatientCareTopic;
use App\Models\JobApplyList;
use App\Models\PatientResponsibilities;
use App\Models\JobOpening;
use App\Models\Tieup;
use Illuminate\Support\Facades\Validator;
use App\Models\TieupContain;
use App\Models\HealthInformation;
use App\Models\GovermentScheme;
use App\Models\HomeContent;
use App\Models\JobAlertMessage;
use App\Models\PhotoGallery;
use App\Models\PhotoGalleryImages;
use App\Models\ContactUsInquiry;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    private $country;
    private $data;

    public function __construct()
    {
        $this->data = [];
        $this->country = Country::orderby('name')->get();
        \View::share('specialities', Specialities::where('is_show', 1)->orderby('name')->get());
        \View::share('patients_guide_services', PatientsGuideService::where('status', 1)->orderby('id')->get());
        \View::share('departments', Department::orderby('department_name')->get());
        \View::share('doctors', DoctorProfile::with(['speciality', 'department'])->where('active', 1)->orderby('full_name')->get());
        \View::share('message_reviews', PatientReviews::with('Specialities')->where('feedback_type', "write")->inRandomOrder()->take(4)->get());
        \View::share('video_reviews', PatientReviews::with('Specialities')->where('feedback_type', "video")->inRandomOrder()->take(4)->get());
    }
    public function home()
    {
        $this->data['country'] = $this->country;
        $this->data['sliders'] = HomeSlider::where('status', 1)->orderBy('order')->get();
        $this->data['home_content'] = HomeContent::first();
        $this->data['certificates'] = AchievementCertificates::where('status', 1)->orderBy('order')->get();
        $this->data['checkup_plan'] = CheckUpPlan::all();
        $this->data['test_type'] = TestType::where('is_show', 1)->get();
        $this->data['events'] = Event::where('active', 1)->orderby('order')->get();
        return view('pages.home')->with($this->data);
    }
    public function enquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'help_name' => 'required|max:30',
            'help_email' => 'required',
            'help_comment' => 'required',
            'help_contact' => 'required|numeric',
            'help_treatment_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request);
        $enquiry = new Enquiry();
        $enquiry->help_name = $request->help_name;
        $enquiry->help_email = $request->help_email;
        $enquiry->help_comment = $request->help_comment;
        $enquiry->country_code = $request->help_country_code_mobile;
        $enquiry->help_contact = $request->help_contact;
        $enquiry->help_treatment_name = $request->help_treatment_name;
        if ($enquiry->save()) {
            return response()->json(['success' => true, 'data' => $enquiry], 200);
        }
    }
    public function patient_review($id)
    {
        $review = PatientReviews::find($id);
        return response()->json($review);
    }
    public function get_certi_details($id)
    {
        $certificate = AchievementCertificates::find($id);
        if ($certificate) {
            return response()->json(['success' => true, 'message' => 'Success', "data" => $certificate], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', "data" => []], 200);
        }
    }
    public function get_checkup_plan_details($id)
    {
        $plan = CheckUpPlan::find($id);
        if ($plan) {
            return response()->json(['success' => true, 'message' => 'Success', "data" => $plan], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', "data" => []], 200);
        }
    }
    public function get_job_opening_details($id)
    {
        $job_opening = JobOpening::findOrFail($id);
        if ($job_opening) {
            return response()->json(['success' => true, 'message' => 'Success', "data" => $job_opening], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', "data" => []], 200);
        }
    }
    public function get_job_categories($opening)
    {
        if ($opening != "all") {
            $categories = JobOpening::where('recuirement_dept', $opening)->where('status', 1)->orderby('department_name')->get();
        } else {
            $categories = JobOpening::where('status', 1)->orderby('department_name')->get();
        }
        return response()->json($categories);
    }
    // get doctor data function
    public function get_doctor_data($id)
    {
        $doctor = DoctorProfile::findOrFail($id);
        $morning_timing = '';
        $eveining_timimg = '';
        if ($doctor->opd_timings_morning != null) {
            $morning_timing = explode('To', $doctor->opd_timings_morning);
            $morning_timing_0 = (new \App\Helpers\CommonHelper())->timing($morning_timing[0]);

            $morning_timing_1 = (new \App\Helpers\CommonHelper())->timing($morning_timing[1]);
            $morning_timing = $morning_timing_0  . " To " .  $morning_timing_1;
        }

        if ($doctor->opd_timings_eveining != null) {
            $eveining_timimg = explode('To', $doctor->opd_timings_eveining);
            $eveining_timimg_0 = (new \App\Helpers\CommonHelper())->timing($eveining_timimg[0]);
            $eveining_timimg_1 = (new \App\Helpers\CommonHelper())->timing($eveining_timimg[1]);
            $eveining_timimg = $eveining_timimg_0 . " To " . $eveining_timimg_1;
        }

        if ($doctor) {
            return response()->json(['success' => true, 'message' => 'Success', "data" => [$doctor, $morning_timing, $eveining_timimg], 200]);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong.', "data" => []], 200);
        }
    }
    public function career_form($slug)
    {
        $job_opening = JobOpening::where('slug', $slug)->first();
        $alert_msg = JobAlertMessage::where('status', 1)->first();
        $this->data['country'] = $this->country;
        $this->data['job_opening'] = $job_opening;
        $this->data['alert_msg'] = $alert_msg;
        return view('pages.career_form')->with($this->data);
    }
    public function apply_job(Request $request)
    {
        // dd($request->input('apply_job_country_code'));

        $validator = Validator::make($request->all(), [
            'application_type' => 'required',
            'full_name' => 'required',
            'date' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'email' => 'required',
            'address' => 'required',
            // 'country_code' => 'required',
            'apply_job_contact' => 'required|numeric',
            'job_position' => 'required',
            'qualification' => 'required',
            'experience_year' => 'required',
            'last_organization' => 'required',
            'last_ctc' => 'required',
            'last_designation' => 'required',
            'resume_file' => 'required|mimes:jpeg,jpg,png,pdf,doc,docx',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }
        // dd($request->all());
        $apply_list = new JobApplyList();
        $apply_list->job_id = $request->job_openning_id;
        $apply_list->application_type = $request->application_type;
        $apply_list->full_name = $request->full_name;
        $apply_list->date = $request->date;
        $apply_list->gender = $request->gender;
        $apply_list->marital_status = $request->marital_status;
        $apply_list->email = $request->email;
        $apply_list->address = $request->address;
        $apply_list->country_code = $request->apply_job_country_code;
        $apply_list->contact = $request->apply_job_contact;
        $apply_list->job_position = $request->job_position;
        $apply_list->qualification = $request->qualification;
        $apply_list->experience_year = $request->experience_year;
        $apply_list->last_organization = $request->last_organization;
        $apply_list->last_ctc = $request->last_ctc;
        $apply_list->last_designation = $request->last_designation;
        $apply_list->information = $request->information;
        if ($request->hasfile('resume_file')) {
            $fileName = time() . '.' . $request->resume_file->extension();
            if ($request->resume_file->storeAs('public/uploads/careers/', $fileName)) {
                $apply_list->resume_file = $fileName;
                $apply_list->file_path = 'app/public/uploads/careers/';
            }
        }
        $file = str_replace("/public", "", url('/')) . '/storage/app/public/uploads/careers/' . $apply_list->resume_file;
        if ($apply_list->save()) {
            Mail::send('mail.resume_mail', ['appiler_data' => $apply_list], function ($message) use ($request, $file) {
                $message->to('careers@kiranhospital.com');
                $message->subject('New candidate apply for ' . $request->job_position . ' position');
                $message->attach($file);
            });
            return response()->json(['success' => true, 'message' => 'Thank you for the job applying. we will contact you soon.'], 200);
        }
    }
    public function signup()
    {
        $state = State::where('country_id', '101')->orderby('name')->get();
        $this->data['country'] = $this->country;
        $this->data['state'] = $state;
        return view('pages.auth.signup')->with($this->data);
    }
    public function login()
    {
        $this->data['country'] = $this->country;
        return view('pages.auth.login')->with($this->data);
    }
    public function recover_mail()
    {
        $this->data['country'] = $this->country;
        return view('pages.auth.recover_mail')->with($this->data);
    }
    public function about_us()
    {
        $vision_data = VisionAndMission::get();
        $speak = ChairmanSpeak::first();
        $about_us = AboutUs::first();
        $message = ChairmanMessage::first();
        $management_message = ManagementMessage::get();
        if (empty($about_us)) {
            return redirect('/');
        }
        $this->data['about_us'] = $about_us;
        $this->data['vision_data'] = $vision_data;
        $this->data['speak'] = $speak;
        $this->data['message'] = $message;
        $this->data['management_message'] = $management_message;
        $this->data['country'] = $this->country;
        return view('pages.about_us')->with($this->data);
    }

    public function get_state($id)
    {
        $model = State::where('country_id', $id)->orderby('name')->get();
        return $model;
    }
    public function get_city($id)
    {
        $model = City::where('state_id', $id)->orderby('city')->get();
        return $model;
    }
    public function get_specialities($slug)
    {
        // dd($slug);
        $speciality = Specialities::with(['Content', 'Topic', 'Tabcontent'])->where('slug', $slug)->first();
        $query = DoctorProfile::whereRaw("FIND_IN_SET($speciality->id, speciality_id)")
            ->where('active', 1)->orderby('full_name')->get();
        $plan = CheckUpPlan::where('is_show', 1)->get();
        $review = PatientReviews::where('speciality_id', $speciality->id)->get();
        $this->data['contact_details'] = ContactUsContains::where("id", 1)->first();
        $this->data['country'] = $this->country;
        $this->data['speciality'] = $speciality;
        $this->data['plan'] = $plan;
        $this->data['test_type'] = TestType::where('is_show', 1)->get();
        $this->data['review'] = $review;
        $this->data['doctor_profiles'] = $query;
        return view('pages.specialities')->with($this->data);
    }
    public function get_patients_guide_services($slug)
    {
        $guide_service = PatientsGuideService::where('slug', $slug)->first();
        $rooms_category = RoomCategory::get();
        $floor_plan_array = [];
        $wings = Wing::orderBy('id', 'ASC')->get();
        $floors = Floor::orderBy('id', 'ASC')->get();
        $doctors = DoctorProfile::with(['speciality', 'department', 'cluster'])->where('active', 1)->orderby('full_name')->get();
        foreach ($wings as $key => $wing) {
            //$floor_plan_array[$wing->id] = [$wing->wing_title];
            foreach ($floors as $floor) {
                $floor_plan_array[$wing->id][$floor->id] = "";
                //$floor_plan_array[$wing->id][$floor->id] = FloorPlan::where(['wing_id'=>$wing->id,'floor_id'=>$floor->id])->pluck('section_ids')->first();
                $sections_ids = FloorPlan::where(['wing_id' => $wing->id, 'floor_id' => $floor->id])->pluck('section_ids')->first();
                $section_id_array = explode(",", $sections_ids);
                foreach ($section_id_array as $id) {
                    $floor_plan_array[$wing->id][$floor->id] .= Section::where(['id' => $id])->pluck('section_name')->first() . ",";
                }
                $floor_plan_array[$wing->id][$floor->id] = rtrim($floor_plan_array[$wing->id][$floor->id], ",");
            }
        }
        $this->data['floor_plans'] = $floor_plan_array;
        $this->data['wings'] = $wings;
        $this->data['floors'] = $floors;
        // $rooms = Room::limit(3)->get();
        $this->data['country'] = $this->country;
        // $this->data['rooms'] = $rooms;
        $this->data['rooms_category'] = $rooms_category;
        $this->data['doctors'] = $doctors;
        $this->data['guide_service'] = $guide_service;
        return view('pages.patients_guide_services')->with($this->data);
    }
    public function load_roomdata(Request $request)
    {
        if ($request->ajax()) {
            if ($request->filter == "all") {
                $rooms = Room::paginate(6);
            } else {
                $rooms = Room::where('room_category_id', $request->filter)->paginate(6);
            }
            $returnHTML = view('pages.room_data')->with('rooms', $rooms)->render();
            if ($returnHTML) {
                return response()->json(array('success' => true, 'html' => $returnHTML, 'data' => $rooms));
            } else {
                return response()->json(array('success' => false, 'html' => '', 'data' => '[]'));
            }
            return $rooms;
        }
    }

    public function hosp_tour()
    {
        $rooms_category = RoomCategory::get();
        $tour_video = HospitalTourVideo::first();
        $this->data['rooms_category'] = $rooms_category;
        $this->data['tour_video'] = $tour_video;
        $this->data['tour_timeline'] = HospitalTourTimeline::orderBy('year', "DESC")->get();
        $this->data['country'] = $this->country;
        return view('pages.hosp_tour')->with($this->data);
    }
    public function floor_plan()
    {
        // use App\Models\Wing;
        // use App\Models\Floor;
        // use App\Models\Section;
        // use App\Models\FloorPlan;
        $floor_plan_array = [];
        $wings = Wing::orderBy('id', 'ASC')->get();
        $floors = Floor::orderBy('id', 'ASC')->get();

        foreach ($wings as $key => $wing) {
            //$floor_plan_array[$wing->id] = [$wing->wing_title];
            foreach ($floors as $floor) {
                $floor_plan_array[$wing->id][$floor->id] = "";
                //$floor_plan_array[$wing->id][$floor->id] = FloorPlan::where(['wing_id'=>$wing->id,'floor_id'=>$floor->id])->pluck('section_ids')->first();
                $sections_ids = FloorPlan::where(['wing_id' => $wing->id, 'floor_id' => $floor->id])->pluck('section_ids')->first();
                $section_id_array = explode(",", $sections_ids);
                foreach ($section_id_array as $id) {
                    $floor_plan_array[$wing->id][$floor->id] .= Section::where(['id' => $id])->pluck('section_name')->first() . ",";
                }
                $floor_plan_array[$wing->id][$floor->id] = rtrim($floor_plan_array[$wing->id][$floor->id], ",");
            }
        }
        $this->data['country'] = $this->country;
        $this->data['floor_plans'] = $floor_plan_array;
        $this->data['wings'] = $wings;
        $this->data['floors'] = $floors;
        return view('pages.floor_plan')->with($this->data);
    }
    public function patients_responsibilities()
    {
        $rights_responsibilities = PatientResponsibilities::first();
        if (empty($rights_responsibilities)) {
            return redirect('/');
        }
        $this->data['rights_responsibilities'] = $rights_responsibilities;
        $this->data['country'] = $this->country;
        return view('pages.patients_responsibilities')->with($this->data);
    }
    public function dos_donts()
    {
        $do_and_donts = DoAndDonts::with('Content')->first();
        if (empty($do_and_donts)) {
            return redirect('/');
        }
        $this->data['do_and_donts'] = $do_and_donts;
        $this->data['country'] = $this->country;
        return view('pages.dos_donts')->with($this->data);
    }
    public function visiting_hours()
    {
        $hours = VisitingHours::first();
        if (empty($hours)) {
            return redirect('/');
        }
        $this->data['hours'] = $hours;
        $this->data['country'] = $this->country;
        return view('pages.visiting_hours')->with($this->data);
    }
    public function dos_donts_2()
    {
        $this->data['country'] = $this->country;
        return view('pages.dos_donts_2')->with($this->data);
    }
    public function robotic_surgery()
    {
        $this->data['country'] = $this->country;
        return view('pages.robotic_surgery')->with($this->data);
    }
    public function department_amenities()
    {
        $this->data['country'] = $this->country;
        return view('pages.department_amenities')->with($this->data);
    }
    public function new_radiation_machines()
    {
        $this->data['country'] = $this->country;
        return view('pages.new_radiation_machines')->with($this->data);
    }
    public function liver_transplant()
    {
        $this->data['country'] = $this->country;
        return view('pages.liver_transplant')->with($this->data);
    }
    public function kidney()
    {
        $this->data['country'] = $this->country;
        return view('pages.kidney')->with($this->data);
    }
    public function heart()
    {
        $this->data['country'] = $this->country;
        return view('pages.heart')->with($this->data);
    }
    public function lung()
    {
        $this->data['country'] = $this->country;
        return view('pages.lung')->with($this->data);
    }
    public function empanelled_corporates()
    {
        $this->data['country'] = $this->country;
        $this->data['page_contain'] = TieupContain::where('contain_for', 'corporate')->first();

        $this->data['corporate_tieups'] = Tieup::where('tieup_type', 'corporate')->where('active', 1)->orderby('company_name')->get();
        return view('pages.empanelled_corporates')->with($this->data);
    }
    public function tpa_cashless()
    {
        $this->data['country'] = $this->country;
        $this->data['page_contain'] = TieupContain::where('contain_for', 'tpa')->first();
        $this->data['tpa_tieups'] = Tieup::where('tieup_type', 'tpa')->where('active', 1)->orderby('company_name')->get();
        return view('pages.tpa_cashless')->with($this->data);
    }
    public function goverment_schemes()
    {
        $this->data['country'] = $this->country;
        $this->data['goverment_schemes'] = GovermentScheme::where('active', 1)->get();
        return view('pages.goverment_schemes')->with($this->data);
    }
    public function health_tips()
    {
        $tip = HealthInformation::where('info_type', 'tip')->where('active', 1)->first();
        if (empty($tip)) {
            return redirect('/');
        }
        $this->data['country'] = $this->country;
        $this->data['tip'] = $tip;
        return view('pages.health_tips')->with($this->data);
    }
    public function statutory_compliance()
    {
        $statutory_compliances = HealthInformation::where('info_type', 'compliance')->where('active', 1)->get();
        if (empty($statutory_compliances)) {
            return redirect('/');
        }
        $this->data['country'] = $this->country;
        $this->data['statutory_compliances'] = $statutory_compliances;
        return view('pages.statutory_compliance')->with($this->data);
    }
    public function international_patient_care()
    {
        $patient_cares = InternationalPatientCare::first();
        $topics = InternationalPatientCareTopic::where('status', 1)->get();
        if (empty($patient_cares)) {
            return redirect('/');
        }
        $this->data['patient_cares'] = $patient_cares;
        $this->data['topics'] = $topics;
        $this->data['country'] = $this->country;
        return view('pages.international_patient_care')->with($this->data);
    }

    public function news_media()
    {
        $this->data['country'] = $this->country;
        return view('pages.news_media')->with($this->data);
    }
    public function social_media()
    {
        $this->data['country'] = $this->country;
        return view('pages.social_media')->with($this->data);
    }
    public function speciality_clinic()
    {
        $speciality_clinic = SpecialityClinic::first();
        if (empty($speciality_clinic)) {
            return redirect('/');
        }
        $this->data['speciality_clinic'] = $speciality_clinic;
        $this->data['clinic'] = ClinicList::where('status', '1')->get();
        $this->data['country'] = $this->country;
        return view('pages.speciality_clinic')->with($this->data);
    }
    public function careers(Request $request)
    {
        if ($request->ajax()) {
            $job_dept_id = $request->job_dept_id;
            if (isset($request->job_dept_id)) {
                $request->job_dept_id = array_filter($request->job_dept_id, static function ($element) {
                    return $element !== "all";
                });
            }
            $filter = array(
                'job_opening_type' =>  $request->job_opening_type,
                'job_dept_id' => $request->job_dept_id,
                'search' => $request->search,
            );
            if ($filter['job_dept_id'] == null) {
                $filter['job_dept_id'] = [];
            }
            // dd($filter);
            $opening = JobOpening::where('status', 1)->where(function ($query) use ($filter, $job_dept_id) {
                if ($filter['job_opening_type']) {
                    if ($filter['job_opening_type'] != "all") {
                        $query->where('recuirement_dept', $filter['job_opening_type']);
                    }
                }
                if ($filter['job_dept_id']) {
                    $query->whereIn('id', $filter['job_dept_id']);
                }
                if ($filter['search']) {
                    $search = $filter['search'];
                    $query->Where('department_name', 'LIKE', "%$search%");
                }
            })->orderby('department_name')->get();
            $returnHTML = view('pages.filtercareer')->with('opening', $opening)->with('filter', $filter)->render();
            if ($returnHTML) {
                return response()->json(array('success' => true, 'html' => $returnHTML, 'data' => $opening, 'filter' => $filter));
            } else {
                return response()->json(array('success' => false, 'html' => '', 'data' => '[]'));
            }
        } else {
            $opening = JobOpening::where('status', 1)->orderby('department_name')->get();
            $this->data['opening'] = $opening;
            $this->data['country'] = $this->country;
            return view('pages.careers')->with($this->data);
        }
    }
    public function social_activity()
    {
        $this->data['country'] = $this->country;
        return view('pages.social_activity')->with($this->data);
    }
    public function photo_gallery()
    {
        $galleries = PhotoGallery::with('Images')->where('status', 1)->get();
        if (empty($galleries)) {
            return redirect('/');
        }
        $this->data['country'] = $this->country;
        $this->data['galleries'] = $galleries;
        return view('pages.photo_gallery')->with($this->data);
    }
    public function get_gallery_image($slug)
    {
        $gallery_image = PhotoGallery::with('Images')->where('slug', $slug)->first();
        $this->data['country'] = $this->country;
        $this->data['gallery_image'] = $gallery_image;
        return view('pages.gallery_section')->with($this->data);
    }
    public function load_gallery_data(Request $request)
    {
        if ($request->ajax()) {
            if ($request->filter == "all") {
                $galleries = PhotoGallery::where('status', 1)->paginate(6);
            } else {
                $galleries = PhotoGallery::whereYear('date', $request->filter)->paginate(6);
            }
            // dd($galleries);
            $returnHTML = view('pages.gallery_data')->with('galleries', $galleries)->render();
            if ($returnHTML) {
                return response()->json(array('success' => true, 'html' => $returnHTML, 'data' => $galleries));
            } else {
                return response()->json(array('success' => false, 'html' => '', 'data' => '[]'));
            }
        }
    }
    public function form()
    {
        $this->data['country'] = $this->country;
        $this->data['events'] = Event::where('active', 1)->where('event_type', 'file')->get();
        return view('pages.form')->with($this->data);
    }
    public function events_conference()
    {
        $this->data['country'] = $this->country;
        return view('pages.events_conference')->with($this->data);
    }
    public function patient_feedbacks()
    {
        $reviews = PatientReviews::with('Specialities')->get();
        if (empty($reviews)) {
            return redirect('/');
        }
        $this->data['country'] = $this->country;
        $this->data['reviews'] = $reviews;
        return view('pages.patient_feedbacks')->with($this->data);
    }
    public function load_feedback_data(Request $request)
    {
        if ($request->ajax()) {
            $reviews = PatientReviews::with('Specialities')->where('feedback_type', $request->filter)->paginate(4);
            $returnHTML = view('pages.feedback_data')->with('reviews', $reviews)->with('filter', $request->filter)->render();
            if ($returnHTML) {
                return response()->json(array('success' => true, 'html' => $returnHTML, 'data' => $reviews));
            } else {
                return response()->json(array('success' => false, 'html' => '', 'data' => '[]'));
            }
            // if ($request->filter == "all") {
            //     $galleries = PhotoGallery::where('status',1)->paginate(6);
            // } else {
            //     $galleries = PhotoGallery::whereYear('date', $request->filter)->paginate(6);
            // }
            // // dd($galleries);
            // $returnHTML = view('pages.gallery_data')->with('galleries', $galleries)->render();
            // if ($returnHTML) {
            //     return response()->json(array('success' => true, 'html' => $returnHTML, 'data' => $galleries));
            // } else {
            //     return response()->json(array('success' => false, 'html' => '', 'data' => '[]'));
            // }
        }
    }
    public function home_visit_lab()
    {
        $state = State::where('country_id', '101')->orderby('name')->get();
        $this->data['country'] = $this->country;

        $this->data['state'] = $state;
        return view('pages.home_visit_lab')->with($this->data);
    }
    public function online_video_consultation()
    {
        $this->data['country'] = $this->country;
        return view('pages.online_video_consultation')->with($this->data);
    }
    public function privacy_policy()
    {
        $this->data['country'] = $this->country;
        return view('pages.privacy_policy')->with($this->data);
    }
    public function terms_conditions()
    {
        $conditions = TermsCondition::where('is_show', 1)->orderby('id')->get();
        $this->data['country'] = $this->country;
        $this->data['conditions'] = $conditions;
        return view('pages.terms_conditions')->with($this->data);
    }

    public function doctorprofiles(Request $request)
    {
        $this->data['country'] = $this->country;

        return view('pages.doctorprofiles')->with($this->data);
    }
    public function load_doctor_data(Request $request)
    {
        $department_id = $request->input('dep_id');
        $dr_id = $request->input('common_dr_id');

        if ($dr_id && is_array($dr_id) == true) {
            $cnt_select = count($dr_id);
        } else if ($dr_id && is_array($dr_id) == false) {
            $cnt_select = 1;
        } else {
            $cnt_select = '';
        }

        $doctor_data = DoctorProfile::with(['speciality', 'department'])->where('active', 1)->where(function ($query) use ($dr_id, $department_id) {
            if (!empty($department_id) || !empty($dr_id)) {
                if ($department_id) {
                    $query->where('department_id', '=', $department_id);
                }
                if ($dr_id) {
                    if (is_array($dr_id) == true) {
                        $query->whereIn('id',  $dr_id);
                    } else {
                        $query->where('id', '=', $dr_id);
                    }
                }
                if ($dr_id && $department_id) {
                    if (is_array($dr_id) == true) {
                        $query->where('department_id', '=', $department_id);
                        $query->whereIn('id',  $dr_id);
                    } else {
                        $query->where('department_id', '=', $department_id);
                        $query->where('id', '=', $dr_id);
                    }
                }
            }
        })->orderby('full_name')->paginate(12);
        $returnHTML = view('pages.doctor_data')->with('doctor_data', $doctor_data)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML, 'data' => $doctor_data, 'cnt_select' => $cnt_select));
    }
    public function find_doctor(Request $request)
    {

        $department_id = $request->input('department_id');
        $dr_id = $request->input('dr_id');

        if ($dr_id && is_array($dr_id) == true) {
            $cnt_select = count($dr_id);
        } else if ($dr_id && is_array($dr_id) == false) {
            $cnt_select = 1;
        } else {
            $cnt_select = '';
        }

        $doctors = DoctorProfile::with(['speciality', 'department'])->where('active', 1)->where(function ($query) use ($dr_id, $department_id) {
            if (!empty($department_id) || !empty($dr_id)) {
                if ($department_id) {
                    $query->where('department_id', '=', $department_id);
                }
                if ($dr_id) {
                    if (is_array($dr_id) == true) {
                        $query->whereIn('id',  $dr_id);
                    } else {
                        $query->where('id', '=', $dr_id);
                    }
                }
                if ($dr_id && $department_id) {
                    if (is_array($dr_id) == true) {
                        $query->where('department_id', '=', $department_id);
                        $query->whereIn('id',  $dr_id);
                    } else {
                        $query->where('department_id', '=', $department_id);
                        $query->where('id', '=', $dr_id);
                    }
                }
            }
        })->orderby('full_name')->get();

        $html = view('pages.doctorprofilesfilter')->with('doctor_details', $doctors)->render();

        if ($html) {
            return response()->json(['success' => true, 'html' => $html, 'cnt_select' => $cnt_select]);
        } else {
            return response()->json(['success' => false, 'html' => '', 'cnt_select' => '']);
        }

        return json_encode($html);
    }

    public function get_doctor($id)
    {
        if ($id != 0) {
            $doctor = DoctorProfile::where('department_id', $id)->where('active', 1)->orderby('full_name')->get();
        } else {
            $doctor = DoctorProfile::where('active', 1)->orderby('full_name')->get();
        }

        return response()->json($doctor);
    }

    public function list_common_doctor($department_id)
    {
        if ($department_id != 0) {
            $doctor = DoctorProfile::where('department_id', $department_id)->where('active', 1)->orderby('full_name')->get();
        } else {
            $doctor = DoctorProfile::where('active', 1)->orderby('full_name')->get();
        }
        return response()->json($doctor);
    }

    public function common_find_doctor(Request $request)
    {
        $country = $this->country;
        $common_department_id = $request->input('department_id');
        // dd($department_id);
        $common_dr_id = $request->input('dr_id');

        return view('pages.doctorprofiles', compact('common_department_id', 'common_dr_id', 'country'));
    }

    public function contact_us_page()
    {
        $country = Country::orderby('name')->get();
        $page_contain = ContactUsContains::where("id", 1)->first();

        return view('pages.contact_us', compact('country', 'page_contain'));
    }

    public function kiran_medics()
    {
        $medic = Medic::first();
        if (empty($medic)) {
            return redirect('/');
        }
        $this->data['country'] = $this->country;
        $this->data['medics'] = $medic;
        return view('pages.kiran_medics')->with($this->data);
    }
    public function get_news_updates(Request $request)
    {
        $news = new NewsAndUpdate;
        if ($request->has('year') && $request->year != 'all' && $request->year != 'All') {
            $news = $news->where('year', $request->year);
        }
        $news_list = $news->orderBy('posted_date', "DESC")->paginate(6);
        $html = view("pages.display_news_and_updates", compact('news_list'))->render();
        return response()->json(['status' => 200, 'html' => $html, 'news' => $news_list]);
    }

    public function opd_consultation(Request $request)
    {
        $this->data['country'] = $this->country;

        return view('pages.opd_consultation')->with($this->data);
    }

    public function event_form($event_id)
    {
        $event = Event::find($event_id);

        $html = view('pages.event_form', compact('event'))->render();
        if ($event && $html) {
            return response()->json(['success' => true, 'html' => $html, 'fields' => $event->form_field]);
        } else {
            return response()->json(['success' => false, 'html' => '', 'cnt_select' => '']);
        }
    }

    public function save_event_form(Request $request)
    {
        $form_data = new EventForm();
        $form_data->event_id = $request->event_id;
        $form_data->form_data = json_encode($request->all());
        if ($form_data->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function inquiries_store(Request $request)
    {
        // dd($request->input('country_code_mobile'));
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'email' => 'required|email',
            // 'country_code' => 'required',
            'contact' => 'required|numeric',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'questions' => 'required',
            'speciality' => 'required',
            'report_file' => 'required|max:10000|mimes:docx,doc,pdf,png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $contact_us = new ContactUsInquiry();

        $contact_us->first_name = $request->input('first_name');
        $contact_us->last_name = $request->input('last_name');
        $contact_us->email = $request->input('email');
        $contact_us->country_code = $request->input('country_code_mobile');
        $contact_us->mobile_no = $request->input('contact');
        $contact_us->address = $request->input('address');
        $contact_us->country_id = $request->input('country');
        $contact_us->state_id = $request->input('state');
        $contact_us->your_question = $request->input('questions');
        $contact_us->speciality_id = $request->input('speciality');

        if ($request->hasFile('report_file')) {
            $fileName = time() . '.' . $request->report_file->extension();
            $request->report_file->storeAs('public/uploads/contact_us', $fileName);

            $contact_us->reports_file = $fileName;
        }

        if ($contact_us->save()) {
            $file = str_replace("/public", "", url('/')) . '/storage/app/public/uploads/contact_us/' . $contact_us->reports_file;
            Mail::send('mail.inquiries_mail', ['inquiries_data' => $contact_us], function ($message) use ($request, $file) {
                $message->to('inquiry@kiranhospital.com');
                $message->subject('New inquiries');
                $message->attach($file);
            });
            return response()->json(['success' => true, 'data' => $contact_us], 200);
        }
    }
}
