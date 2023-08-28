<?php

use App\Http\Controllers\Admin\AdminControlller;
use App\Http\Controllers\Admin\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\CMS\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Auth\LoginControlller;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\Home\SliderController;
use App\Http\Controllers\Admin\Home\CertificateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CMS\FAQController;
use App\Http\Controllers\Admin\CMS\TermsConditionController;
use App\Http\Controllers\Admin\Specialities\SpecialitiesController;

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

// Route::get('/', function () {
//     return view('layouts.master');
// });
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [LoginControlller::class, 'login']);
    Route::get('/login', [LoginControlller::class, 'login']);
    Route::post('/dologin', [LoginControlller::class, 'dologin'])->name('dologin');

    Route::get('/logout', [LoginControlller::class,'logout'])->name('logout');

    Route::get('/change_password', [ChangePasswordController::class, 'change_password']);
    Route::post('/change_password', [ChangePasswordController::class, 'change_password_form'])->name('change_password_form');
    Route::get('/reset_password/{token}', [ResetPasswordController::class, 'reset_password'])->name('reset_password_get');
    Route::post('/reset_password', [ResetPasswordController::class, 'reset_password_form'])->name('reset_password_form');
    Route::get('/home', [AdminControlller::class, 'home']);
    Route::get('/profile', [AdminControlller::class, 'profile']);
    Route::get('/about_us', [AdminControlller::class, 'about_us']);
    Route::get('/specialities', [AdminControlller::class, 'specialities']);
    Route::get('/appointment', [AdminControlller::class, 'appointment']);
    Route::get('/doctors', [AdminControlller::class, 'doctors']);
    Route::get('/doctors_profiles', [AdminControlller::class, 'doctors_profiles']);
    Route::get('/floor_plan', [AdminControlller::class, 'floor_plan']);


    Route::resource('/specialities',SpecialitiesController::class);
    Route::post('/specialities/list', [SpecialitiesController::class, 'list']);
    Route::get('/specialities/status/{id}', [SpecialitiesController::class, 'status']);


    /*Contact Us */
    Route::resource('contact_us', ContactUsController::class);
    Route::get('/contain/list', [ContactUsController::class, 'list']);
    Route::get('/contact/inquirys_list', [ContactUsController::class, 'inquirys_list']);
    /* CMS */
    Route::post('/faq/list', [FAQController::class, 'list'])->name('faq.list');
    Route::get('/faq/status/{id}', [FAQController::class, 'faq_status']);
    Route::post('/faq/{id}', [FAQController::class, 'update'])->name('faq.update');
    Route::resource('faq', FAQController::class);
    Route::post('/term/list', [TermsConditionController::class, 'list']);
    Route::get('/term/status/{id}', [TermsConditionController::class, 'status']);
    Route::resource('/terms_and_condition', TermsConditionController::class);

    Route::resource('/home/slider',SliderController::class);
    Route::post('/home/slider/list', [SliderController::class, 'list'])->name('slider.list');
    Route::get('/home/slider/status/{id}', [SliderController::class, 'change_status']);

    Route::resource('/home/certificates',CertificateController::class);
    Route::post('/home/certificates/list', [CertificateController::class, 'list'])->name('certificates.list');
});



Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/signup', [HomeController::class, 'signup']);

/*Login */
Route::post('/do_signup', [AuthController::class, 'do_signup'])->name('do_signup');
Route::post('/uniqueemail', [AuthController::class, 'uniqueemail'])->name('uniqueemail');
Route::post('/uniquemobile', [AuthController::class, 'uniquemobile'])->name('uniquemobile');
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');

Route::get('/recover_mail', [HomeController::class, 'recover_mail']);
Route::get('/about_us', [HomeController::class, 'about_us']);

/*Contact Us */
Route::get('/contact_us', [ContactUsController::class, 'contact_us_page']);


Route::get('/privacy_policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms_conditions', [HomeController::class, 'terms_conditions'])->name('terms_conditions');

Route::get('/get_state/{id}', [HomeController::class, 'get_state']);
Route::get('/get_city/{id}', [HomeController::class, 'get_city']);
Route::get('/get/certificate/{id}',[HomeController::class,'get_certi_details']);

Route::get('/specialities', [HomeController::class, 'specialities']);
Route::get('/anesthesiology_management', [HomeController::class, 'anesthesiology_management']);
Route::get('/bariatric_surgery_weight_loss_surgery', [HomeController::class, 'bariatric_surgery_weight_loss_surgery']);
Route::get('/onco_Surgery', [HomeController::class, 'onco_Surgery']);
Route::get('/cardiology_cardiothoracic_surgery', [HomeController::class, 'cardiology_cardiothoracic_surgery']);
Route::get('/clinical_nutrition', [HomeController::class, 'clinical_nutrition']);
Route::get('/critical_care', [HomeController::class, 'critical_care']);
Route::get('/day_care', [HomeController::class, 'day_care']);
Route::get('/dermatology_cosmetology', [HomeController::class, 'dermatology_cosmetology']);
Route::get('/dental_maxillofacial', [HomeController::class, 'dental_maxillofacial']);
Route::get('/endocrinology', [HomeController::class, 'endocrinology']);
Route::get('/e_n_t', [HomeController::class, 'e_n_t']);
Route::get('/gastroenterology_gi_surgery', [HomeController::class, 'gastroenterology_gi_surgery']);
Route::get('/general_laparoscopic_surgery', [HomeController::class, 'general_laparoscopic_surgery']);
Route::get('/healthcheck_up', [HomeController::class, 'healthcheck_up']);
Route::get('/internal_medicine', [HomeController::class, 'internal_medicine']);
Route::get('/nuclear_medicine_pet_ct', [HomeController::class, 'nuclear_medicine_pet_ct']);
Route::get('/internal_medicine', [HomeController::class, 'internal_medicine']);
Route::get('/neurology', [HomeController::class, 'neurology']);
Route::get('/neurosurgery', [HomeController::class, 'neurosurgery']);
Route::get('/nephrology', [HomeController::class, 'nephrology']);
Route::get('/ophthalmology', [HomeController::class, 'ophthalmology']);
Route::get('/obstetrics_gynaecology', [HomeController::class, 'obstetrics_gynaecology']);
Route::get('/orthopedic', [HomeController::class, 'orthopedic']);
Route::get('/oncology', [HomeController::class, 'oncology']);
Route::get('/pathology_blood_bank', [HomeController::class, 'pathology_blood_bank']);
Route::get('/pediatric_surgery', [HomeController::class, 'pediatric_surgery']);
Route::get('/pediatrics_neonatology', [HomeController::class, 'pediatrics_neonatology']);
Route::get('/psychiatry', [HomeController::class, 'psychiatry']);
Route::get('/pulmonology', [HomeController::class, 'pulmonology']);
Route::get('/plastic_reconstructive_surgery', [HomeController::class, 'plastic_reconstructive_surgery']);
Route::get('/physiotherapy', [HomeController::class, 'physiotherapy']);
Route::get('/radiology', [HomeController::class, 'radiology']);
Route::get('/urology', [HomeController::class, 'urology']);

Route::get('/doctorprofiles', [HomeController::class, 'doctorprofiles']);
Route::get('/hosp_tour', [HomeController::class, 'hosp_tour']);
Route::get('/floor_plan', [HomeController::class, 'floor_plan']);
Route::get('/ambulance_services', [HomeController::class, 'ambulance_services']);
Route::get('/day_care_services', [HomeController::class, 'day_care_services']);
Route::get('/general_guide', [HomeController::class, 'general_guide']);
Route::get('/opd_guide', [HomeController::class, 'opd_guide']);
Route::get('/ipd_guide', [HomeController::class, 'ipd_guide']);
Route::get('/amenities', [HomeController::class, 'amenities']);
Route::get('/patient_rooms', [HomeController::class, 'patient_rooms']);
Route::get('/patients_responsibilities', [HomeController::class, 'patients_responsibilities']);
Route::get('/dos_donts', [HomeController::class, 'dos_donts']);
Route::get('/international_patient', [HomeController::class, 'international_patient']);
Route::get('/visiting_hours', [HomeController::class, 'visiting_hours']);
Route::get('/dos_donts_2', [HomeController::class, 'dos_donts_2']);
Route::get('/robotic_surgery', [HomeController::class, 'robotic_surgery']);
Route::get('/department_amenities', [HomeController::class, 'department_amenities']);
Route::get('/new_radiation_machines', [HomeController::class, 'new_radiation_machines']);
Route::get('/liver_transplant', [HomeController::class, 'liver_transplant']);
Route::get('/kidney', [HomeController::class, 'kidney']);
Route::get('/heart', [HomeController::class, 'heart']);
Route::get('/lung', [HomeController::class, 'lung']);

Route::get('/empanelled_corporates', [HomeController::class, 'empanelled_corporates']);
Route::get('/tpa_cashless', [HomeController::class, 'tpa_cashless']);
Route::get('/goverment_schemes', [HomeController::class, 'goverment_schemes']);
Route::get('/health_tips', [HomeController::class, 'health_tips']);
Route::get('/statutory_compliance', [HomeController::class, 'statutory_compliance']);
Route::get('/international_patient_care', [HomeController::class, 'international_patient_care']);
Route::get('/kiran_medics', [HomeController::class, 'kiran_medics']);
Route::get('/news_media', [HomeController::class, 'news_media']);
Route::get('/social_media', [HomeController::class, 'social_media']);
Route::get('/speciality_clinic', [HomeController::class, 'speciality_clinic']);
Route::get('/careers', [HomeController::class, 'careers']);
Route::get('/social_activity', [HomeController::class, 'social_activity']);
Route::get('/photo_gallery', [HomeController::class, 'photo_gallery']);
Route::get('/form', [HomeController::class, 'form']);
Route::get('/events_conference', [HomeController::class, 'events_conference']);
Route::get('/patient_feedbacks', [HomeController::class, 'patient_feedbacks']);
Route::get('/home_visit_lab', [HomeController::class, 'home_visit_lab']);
Route::get('/online_video_consultation', [HomeController::class, 'online_video_consultation']);
