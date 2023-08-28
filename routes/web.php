<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* home */
Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/get/certificate/{id}', [HomeController::class, 'get_certi_details']);
Route::get('/get_state/{id}', [HomeController::class, 'get_state']);
Route::get('/get_city/{id}', [HomeController::class, 'get_city']);
Route::post('/enquiry', [HomeController::class, 'enquiry'])->name('enquiry');
Route::get('/patient_review/{id}', [HomeController::class, 'patient_review'])->name('patient_review');

/* login & signup*/
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/signup', [HomeController::class, 'signup']);
Route::post('/do_signup', [AuthController::class, 'do_signup'])->name('do_signup');
Route::post('/uniqueemail', [AuthController::class, 'uniqueemail'])->name('uniqueemail');
Route::post('/uniquemobile', [AuthController::class, 'uniquemobile'])->name('uniquemobile');
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
Route::get('/recover_mail', [HomeController::class, 'recover_mail']);

/* About Us*/
Route::get('/about_us', [HomeController::class, 'about_us'])->name('about_us');

/* contact us */
Route::get('/contact_us', [HomeController::class, 'contact_us_page'])->name('contact_us');
Route::post('/inquiries_store', [HomeController::class, 'inquiries_store'])->name('inquiries_store');

/* privacy policy */
Route::get('/privacy_policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');

/* terms conditions */
Route::get('/terms_conditions', [HomeController::class, 'terms_conditions'])->name('terms_conditions');

// Specialities
Route::get('/specialities/{slug}', [HomeController::class, 'get_specialities'])->name('get_specialities');

//Plan
Route::get('/get/checkup_plan/{id}', [HomeController::class, 'get_checkup_plan_details']);

/* doctor Profile */
Route::get('/doctorprofiles', [HomeController::class, 'doctorprofiles'])->name('doctorprofiles');
Route::post('/doctorprofiles', [HomeController::class, 'find_doctor'])->name('find_doctor');
Route::get('/get_doctor/{id}', [HomeController::class, 'get_doctor']);
Route::get('/list_common_doctor/{department_id}', [HomeController::class, 'list_common_doctor']);
Route::post('/common_find_doctor', [HomeController::class, 'common_find_doctor'])->name('common_find_doctor');
Route::post('/load_doctor_data', [HomeController::class, 'load_doctor_data']);
Route::get('/get_doctor_data/{doc_id}', [HomeController::class, 'get_doctor_data']);

// Hospital Tour
Route::get('/hosp_tour', [HomeController::class, 'hosp_tour'])->name('hosp_tour');

// Patients & Visitors
Route::get('/patients_guide_service/{slug}', [HomeController::class, 'get_patients_guide_services'])->name('get_patients_guide_services');
Route::post('/room_data', [HomeController::class, 'load_roomdata']);
Route::get('/patients_responsibilities', [HomeController::class, 'patients_responsibilities'])->name('patients_responsibilities');
Route::get('/dos_donts', [HomeController::class, 'dos_donts'])->name('dos_donts');
Route::get('/visiting_hours', [HomeController::class, 'visiting_hours'])->name('visiting_hours');
Route::get('/floor_plan', [HomeController::class, 'floor_plan']);

// Empanelled Corporates
Route::get('/empanelled_corporates', [HomeController::class, 'empanelled_corporates'])->name('empanelled_corporates');

// TPA & Cashless Tie-Ups
Route::get('/tpa_cashless', [HomeController::class, 'tpa_cashless'])->name('tpa_cashless');

// Government Schemes
Route::get('/goverment_schemes', [HomeController::class, 'goverment_schemes'])->name('goverment_schemes');

// Health Information
Route::get('/health_tips', [HomeController::class, 'health_tips'])->name('health_tips');
Route::get('/statutory_compliance', [HomeController::class, 'statutory_compliance'])->name('statutory_compliance');

// International Patient care
Route::get('/international_patient_care', [HomeController::class, 'international_patient_care'])->name('international_patient_care');

// Kiran Medics
Route::get('/kiran_medics', [HomeController::class, 'kiran_medics'])->name('kiran_medics');;

//Speciality Clinic
Route::get('/speciality_clinic', [HomeController::class, 'speciality_clinic'])->name('speciality_clinic');

// Photo Gallery
Route::get('/photo_gallery', [HomeController::class, 'photo_gallery'])->name('photo_gallery');
Route::get('/photo_gallery/{slug}', [HomeController::class, 'get_gallery_image'])->name('get_gallery_image');
Route::post('/load_gallery_data', [HomeController::class, 'load_gallery_data']);

//Careers
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::post('/careers', [HomeController::class, 'careers'])->name('careers');
Route::get('/get/job_opening/{id}', [HomeController::class, 'get_job_opening_details']);
Route::get('/get/career_form/{slug}', [HomeController::class, 'career_form'])->name('career_form');
Route::post('/apply_job', [HomeController::class, 'apply_job'])->name('apply_job');
Route::get('/get_job_categories/{opening}', [HomeController::class, 'get_job_categories']);

// News and Media
Route::get('/news_media', [HomeController::class, 'news_media'])->name('news_media');
Route::any('/get/news_updates', [HomeController::class, 'get_news_updates']);

// Patient Feedback
Route::get('/patient_feedbacks', [HomeController::class, 'patient_feedbacks'])->name('patient_feedbacks');
Route::post('/load_feedback_data', [HomeController::class, 'load_feedback_data']);


Route::get('/robotic_surgery', [HomeController::class, 'robotic_surgery']);
Route::get('/department_amenities', [HomeController::class, 'department_amenities']);
Route::get('/new_radiation_machines', [HomeController::class, 'new_radiation_machines']);
Route::get('/liver_transplant', [HomeController::class, 'liver_transplant']);
Route::get('/kidney', [HomeController::class, 'kidney']);
Route::get('/heart', [HomeController::class, 'heart']);
Route::get('/lung', [HomeController::class, 'lung']);

Route::get('/social_media', [HomeController::class, 'social_media']);
Route::get('/social_activity', [HomeController::class, 'social_activity'])->name('social_activity');
Route::get('/form', [HomeController::class, 'form'])->name('form');
Route::get('/events_conference', [HomeController::class, 'events_conference'])->name('events_conference');
Route::get('/home_visit_lab', [HomeController::class, 'home_visit_lab'])->name('home_visit_lab');
Route::get('/online_video_consultation', [HomeController::class, 'online_video_consultation'])->name('online_video_consultation');
Route::get('/opd_consultation', [HomeController::class, 'opd_consultation'])->name('opd_consultation');


Route::get('/get/event/{id}', [HomeController::class, 'event_form'])->name('event_form');
Route::post('/save/event', [HomeController::class, 'save_event_form'])->name('save_event_form');
