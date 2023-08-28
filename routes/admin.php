<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\WingController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\AdminControlller;
use App\Http\Controllers\Admin\CareersController;
use App\Http\Controllers\Admin\ClusterController;
use App\Http\Controllers\Admin\CMS\FAQController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\FloorPlanController;
use App\Http\Controllers\Admin\Auth\LoginControlller;
use App\Http\Controllers\Admin\CMS\AboutUsController;
use App\Http\Controllers\Admin\DepartmentControlller;
use App\Http\Controllers\Admin\Event\EventController;
use App\Http\Controllers\Admin\Home\SliderController;
use App\Http\Controllers\Admin\Medic\MedicController;
use App\Http\Controllers\Admin\Tieup\TieupController;
use App\Http\Controllers\Admin\RoomCategoryController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\Health\HealthController;
use App\Http\Controllers\Admin\NewsAndUpdatesController;
use App\Http\Controllers\Admin\PatientReviewsController;
use App\Http\Controllers\Admin\Home\CertificateController;
use App\Http\Controllers\Admin\SpecialityClinicController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\CMS\TermsConditionController;
use App\Http\Controllers\Admin\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\ContactUs\ContactUsController;
use App\Http\Controllers\Admin\CheckUp_Plan\TestTypeController;
use App\Http\Controllers\Admin\CheckUp_Plan\SubTestTypeController;
use App\Http\Controllers\Admin\Form_Builder\FormBuilderController;
use App\Http\Controllers\Admin\InternationalPatientCareControlller;
use App\Http\Controllers\Admin\Patients_Guide\DoAndDontsController;
use App\Http\Controllers\Admin\Specialities\SpecialitiesController;
use App\Http\Controllers\Admin\Specialities\SpecialitiesImageController;
use App\Http\Controllers\Admin\CheckUp_Plan\HealthCheckUpController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\Photo_Gallery\GalleryImageController;
use App\Http\Controllers\Admin\Photo_Gallery\PhotoGalleryController;
use App\Http\Controllers\Admin\Patients_Guide\HospitalTourController;
use App\Http\Controllers\Admin\Patients\HospitalTourTimelineController;
use App\Http\Controllers\Admin\Patients_Guide\VisitingHoursControlller;
use App\Http\Controllers\Admin\Goverment_Schemes\GovermentSchemesController;
use App\Http\Controllers\Admin\Home\ContentController;
use App\Http\Controllers\Admin\Patients_Guide\PatientsGuideServiceController;
use App\Http\Controllers\Admin\Patients_Guide\PatientResponsibilitiesController;
use App\Http\Controllers\Admin\Specialities\SpecialitiesTabController;
use App\Http\Controllers\Admin\Specialities\SpecialitiesTabTopicController;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    /*Login */
    Route::get('/', [LoginControlller::class, 'login']);
    Route::get('/login', [LoginControlller::class, 'login']);
    Route::post('/dologin', [LoginControlller::class, 'dologin'])->name('dologin');
    Route::get('/logout', [LoginControlller::class, 'logout'])->name('logout');

    Route::get('/change_password', [ChangePasswordController::class, 'change_password']);
    Route::post('/change_password', [ChangePasswordController::class, 'change_password_form'])->name('change_password_form');
    Route::get('/reset_password/{token}', [ResetPasswordController::class, 'reset_password'])->name('reset_password_get');
    Route::post('/reset_password', [ResetPasswordController::class, 'reset_password_form'])->name('reset_password_form');

    /* Admin Profile */
    Route::post('/profile/update', [AdminControlller::class, 'update_profile']);
    Route::get('/profile_photo/remove', [AdminControlller::class, 'remove_profile_photo']);
    Route::post('/password/update', [AdminControlller::class, 'update_password']);

    /* setting */
    Route::resource('setting', SettingController::class);
    Route::post('setting/list', [SettingController::class, 'list']);
    Route::get('/setting/status/{id}', [SettingController::class, 'change_status']);
    Route::get('/upadte_hospital_logo', [SettingController::class,'upadte_hospital_logo'])->name('upadte_hospital_logo');

    /*Admin manage */
    Route::get('/home', [AdminControlller::class, 'home'])->name('home');
    Route::get('/profile', [AdminControlller::class, 'profile']);
    Route::get('/about_us', [AdminControlller::class, 'about_us']);
    Route::get('/appointment', [AdminControlller::class, 'appointment'])->name('appointment');
    Route::get('/floor_plan', [AdminControlller::class, 'floor_plan']);

    /* About US */
    Route::get('/about_us/vision_mission_add', [AboutUsController::class, 'vision_create']);
    Route::get('/about_us/management_message_add', [AboutUsController::class, 'management_message_create']);
    Route::resource('/about_us', AboutUsController::class);
    Route::get('/bottom_banner_status/{id}',[AboutUsController::class, 'bottom_banner_status']);
    Route::post('/chairman_speak', [AboutUsController::class, 'chairman_speak_store']);
    Route::post('/chairman_message', [AboutUsController::class, 'chairman_message_store']);
    Route::post('/about_us/vision_mission', [AboutUsController::class, 'vision_store']);
    Route::post('/about_us/vision_mission/list', [AboutUsController::class, 'vision_list']);
    Route::get('/about_us/vision_mission/edit/{id}', [AboutUsController::class, 'vision_edit'])->name('vision_edit');
    Route::post('/about_us/vision_mission/update/{id}', [AboutUsController::class, 'vision_update']);
    Route::get('/about_us/vision_mission/delete/{id}', [AboutUsController::class, 'vision_delete'])->name('vision_delete');
    Route::get('/about_us/vision_mission/status/{id}', [AboutUsController::class, 'vision_status']);
    Route::post('/about_us/management_message', [AboutUsController::class, 'management_message_store']);
    Route::post('/about_us/management_message_list', [AboutUsController::class, 'management_message_list']);
    Route::get('/about_us/management_message_status/{id}', [AboutUsController::class, 'management_message_status']);
    Route::get('/about_us/management_message_delete/{id}', [AboutUsController::class, 'management_message_delete'])->name('management_message_delete');
    Route::get('/about_us/management_message_edit/{id}', [AboutUsController::class, 'management_message_edit'])->name('management_message_edit');
    Route::post('/about_us/management_message_update/{id}', [AboutUsController::class, 'management_message_update']);

    /* Home content */
    Route::resource('home_content', ContentController::class);

    /* Home Slider */
    Route::post('/home/slider/list', [SliderController::class, 'list'])->name('slider.list');
    Route::get('/home/slider/register_status/{id}', [SliderController::class, 'register_status']);
    Route::get('/home/slider/status/{id}', [SliderController::class, 'status']);
    Route::post('/home/slider/order',[SliderController::class, 'order']);
    Route::resource('/home/slider', SliderController::class);

    /* Home Certificates */
    Route::resource('/home/certificates', CertificateController::class);
    Route::post('/home/certificates/list', [CertificateController::class, 'list'])->name('certificates.list');
    Route::post('/home/update/certificate', [CertificateController::class, 'update_certificate']);
    Route::get('/home/certificates/status/{id}', [CertificateController::class, 'status']);
    Route::post('/home/certificates/order',[CertificateController::class, 'order']);

    /*Specialities */
    Route::post('/specialities_list', [SpecialitiesController::class, 'list'])->name('specialities_list');
    Route::get('/specialities/content/{count}/{content_type}', [SpecialitiesController::class, 'content'])->name('content_count');
    // Route::get('/specialities/content/{count}/{content_type}/{specialities_id}', [SpecialitiesController::class, 'content'])->name('content_count');
    Route::resource('/specialities', SpecialitiesController::class);
    Route::get('/specialities/status/{id}', [SpecialitiesController::class, 'status'])->name('status_change');
    Route::get('/specialities/content_delete/{id}', [SpecialitiesController::class, 'content_delete'])->name('content_delete');

    // Specialities tab content
    Route::get('/specialities/tab_content/{id}', [SpecialitiesTabTopicController::class, 'tab_content'])->name('tab_content');
    Route::get('/specialities/get_tab_topics/{id}', [SpecialitiesTabTopicController::class, 'get_tab_topics'])->name('get_tab_topics');
    Route::resource('specialities.topics', SpecialitiesTabTopicController::class)->shallow();
    Route::get('/specialities/topics/status/{id}', [SpecialitiesTabTopicController::class, 'status']);
    Route::resource('specialities.tab_content', SpecialitiesTabController::class)->shallow();
    Route::get('/specialities/tab_content/{count}/{content_type}/{topic_id}', [SpecialitiesTabController::class, 'tab_content']);
    Route::post('/specialities/tab_content/order/{topic_id}',[SpecialitiesTabController::class, 'order']);
    Route::get('/specialities_image_all', [SpecialitiesImageController::class, 'all'])->name('specialities_image_all');
    Route::post('/specialities_image/delete', [SpecialitiesImageController::class, 'delete'])->name('specialities_image_delete');
    Route::post('/specialities_image_store/{specialities_id}', [SpecialitiesImageController::class, 'store'])->name('specialities_image_store');


    /*Doctor Profile*/
    Route::resource('doctor', DoctorController::class);
    Route::post('/doctor_profile/profile_list', [DoctorController::class, 'profile_list'])->name('doctor_profile.list');
    Route::post('doctor_profile/{doctor}/activate/toggle', [DoctorController::class, 'activateToggle'])->name('doctor.activate.toggle');
    Route::get('/doctor_list', [DoctorController::class, 'doctor_list'])->name('doctor_list');

    /* Cluster*/
    Route::post('/cluster/list', [ClusterController::class, 'list']);
    Route::get('/cluster/status/{id}', [ClusterController::class, 'status']);
    Route::resource('/cluster', ClusterController::class);

    /*department */
    Route::resource('/department', DepartmentControlller::class);
    Route::post('/department/list', [DepartmentControlller::class, 'list']);

    /*health_checkup_plan */
    Route::post('/health_checkup_plan/list', [HealthCheckUpController::class, 'list']);
    Route::get('/health_checkup_plan/status/{id}', [HealthCheckUpController::class, 'status']);
    Route::resource('/health_checkup_plan', HealthCheckUpController::class);
    Route::get('/get_subtest/{id}', [HealthCheckUpController::class, 'get_subtest']);
    Route::get('/add_test_field/{count}', [HealthCheckUpController::class, 'add_test_field']);

    /* Test Type */
    Route::post('/test_type/list', [TestTypeController::class, 'list']);
    Route::get('/test_type/status/{id}', [TestTypeController::class, 'status']);
    Route::resource('/test_type', TestTypeController::class);

    /* Sub Test Type */
    Route::post('/sub_test_type/list', [SubTestTypeController::class, 'list']);
    Route::get('/sub_test_type/status/{id}', [SubTestTypeController::class, 'status']);
    Route::resource('/sub_test_type', SubTestTypeController::class);

    /*Medics */
    Route::resource('medic', MedicController::class);

    /* Floors */
    Route::resource('/floors', FloorController::class);
    Route::post('/floors/list', [FloorController::class, 'list'])->name('floor.list');
    Route::post('/update/floor', [FloorController::class, 'update_floor']);

    /* Wings */
    Route::resource('/wings', WingController::class);
    Route::post('/wings/list', [WingController::class, 'list'])->name('wing.list');
    Route::post('/update/wing', [WingController::class, 'update_wing']);

    /* Sections */
    Route::resource('/sections', SectionController::class);
    Route::post('/sections/list', [SectionController::class, 'list'])->name('section.list');
    Route::post('/update/section', [SectionController::class, 'update_section']);

    /* Room Category */
    Route::resource('/room_categories', RoomCategoryController::class);
    Route::post('/room_categories/list', [RoomCategoryController::class, 'list'])->name('room_category.list');
    Route::post('/update/room_category', [RoomCategoryController::class, 'update_room_category']);

    /* Room */
    Route::post('/rooms/list', [RoomController::class, 'list'])->name('room.list');
    Route::resource('/rooms', RoomController::class);
    Route::post('/update/rooms', [RoomController::class, 'update_room']);
    Route::post('/get/dropdown/category', [RoomController::class, 'get_room_categories']);

    /* Floor_plans */
    Route::resource('/floor_plans', FloorPlanController::class);
    Route::post('/floor_plans/list', [FloorPlanController::class, 'list'])->name('floor_plans.list');
    Route::post('/update/floor_plan', [FloorPlanController::class, 'update_floor_plan']);

    /* Service & Guide */
    Route::post('/patients_guide_service/list', [PatientsGuideServiceController::class, 'list'])->name('patients_guide_service.list');
    Route::resource('patients_guide_service', PatientsGuideServiceController::class);
    Route::get('/patients_guide_service/status/{id}', [PatientsGuideServiceController::class, 'status']);

    /* visiting_hours */
    Route::resource('visiting_hours', VisitingHoursControlller::class);

    /*dos_donts */
    Route::resource('dos_donts', DoAndDontsController::class);
    Route::get('/dos_donts/content/{count}', [DoAndDontsController::class, 'content']);
    Route::get('/dos_donts/content/delete/{id}', [DoAndDontsController::class, 'content_delete']);

    /*patients_responsibilities */
    Route::resource('patients_responsibilities', PatientResponsibilitiesController::class);

    /*HospitalTourTimeline */
    Route::resource('/hospital_timelines', HospitalTourTimelineController::class);
    Route::post('/hospital_timelines/list', [HospitalTourTimelineController::class, 'list'])->name('hospital_timelines.list');
    Route::post('/update/timeline', [HospitalTourTimelineController::class, 'update_timeline']);

    /*HospitalTour */
    Route::resource('hosp_tour', HospitalTourController::class);

    /* International Patient Care */
    Route::post('/international_patient_care/list', [InternationalPatientCareControlller::class, 'list']);
    Route::get('/international_patient_care/status/{id}', [InternationalPatientCareControlller::class, 'status']);
    Route::resource('/international_patient_care', InternationalPatientCareControlller::class);
    Route::post('/international_patient_care/main', [InternationalPatientCareControlller::class, 'caredata_store']);

    /*Tie Ups */
    Route::resource('tieup', TieupController::class);
    Route::post('/tieup/corporate_tieup_list', [TieupController::class, 'corporate_tieup_list'])->name('corporate_tieup_list');
    Route::post('/tieup/tpa_tieup_list', [TieupController::class, 'tpa_tieup_list'])->name('tpa_tieup_list');
    Route::post('/add_tieup', [TieupController::class, 'tieup_store'])->name('tieup_store');
    Route::post('/tieup/{tieup}/activate/toggle', [TieupController::class, 'activateToggle'])->name('tieup.activate.toggle');
    Route::get('/tieup_edit/edit/{id}', [TieupController::class, 'tieup_edit'])->name('tieup_edit');
    Route::post('/tieup_update/update/{id}', [TieupController::class, 'tieup_update'])->name('tieup_update');
    Route::get('/tpa_tieup', [TieupController::class, 'tpa_tieup_index'])->name('tpa_tieup_index');

    /*Goverment Schemes */
    Route::resource('goverment_scheme', GovermentSchemesController::class);
    Route::post('/scheme_list', [GovermentSchemesController::class, 'scheme_list'])->name('scheme_list');
    Route::post('scheme/{scheme}/activate/toggle', [GovermentSchemesController::class, 'activateToggle'])->name('goverment_scheme.activate.toggle');

    /* Speciality Clinic */
    Route::post('/clinic/list', [SpecialityClinicController::class, 'list']);
    Route::get('/clinic/status/{id}', [SpecialityClinicController::class, 'status']);
    Route::resource('/clinic', SpecialityClinicController::class);
    Route::post('/speciality_clinic', [SpecialityClinicController::class, 'speciality_clinic_store']);

    /* Enquiry */
    Route::post('/enquiry/list', [EnquiryController::class, 'list']);
    Route::resource('/enquiry', EnquiryController::class);

    /*Event management */
    Route::resource('event', EventController::class);
    Route::post('/event/order',[EventController::class, 'order']);
    Route::post('/event/event_list', [EventController::class, 'event_list'])->name('event_list');
    Route::post('event/{event}/activate/toggle', [EventController::class, 'activateToggle'])->name('event.activate.toggle');

    /* FAQ */
    Route::post('/faq/list', [FAQController::class, 'list'])->name('faq.list');
    Route::get('/faq/status/{id}', [FAQController::class, 'faq_status']);
    Route::post('/faq/{id}', [FAQController::class, 'update'])->name('faq.update');
    Route::resource('faq', FAQController::class);

    /* Terms & Condition */
    Route::post('/term/list', [TermsConditionController::class, 'list']);
    Route::get('/term/status/{id}', [TermsConditionController::class, 'status']);
    Route::resource('/terms_and_condition', TermsConditionController::class);

    /*Contact Us */
    Route::resource('contact_us', ContactUsController::class);
    Route::post('/contain/list', [ContactUsController::class, 'list']);
    Route::post('/contact/inquirys_list', [ContactUsController::class, 'inquirys_list']);
    Route::get('/contact/inquirys_show/{id}', [ContactUsController::class, 'inquirys_show'])->name('inquiry.show');

    /*  Careers */
    Route::post('/careers/list', [CareersController::class, 'list']);
    Route::get('/careers/status/{id}', [CareersController::class, 'status']);
    Route::resource('/careers', CareersController::class);
    Route::get('/job_applier', [CareersController::class, 'job_apply_index'])->name('job_apply_index');
    Route::post('/job_applier/list', [CareersController::class, 'job_apply_list'])->name('job_apply_list');
    Route::get('/job_applier/view/{id}', [CareersController::class, 'job_apply_view'])->name('job_apply_view');
    Route::get('/job_applier/export', [CareersController::class, 'job_applier_export'])->name('job_applier_export');
    Route::get('/alert_msg_data', [CareersController::class,'alert_msg_data'])->name('alert_msg_data');
    Route::post('/alert_msg_store', [CareersController::class, 'alert_msg_store'])->name('alert_msg_store');

    /*Health Information */
    Route::resource('health', HealthController::class);
    Route::post('/health/health_tip_list', [HealthController::class, 'health_tip_list'])->name('health_tip_list');
    Route::get('/statutory_compliance', [HealthController::class, 'statutory_compliance_index'])->name('statutory_compliance_index');
    Route::post('/health/{health}/activate/toggle', [HealthController::class, 'activateToggle'])->name('health.activate.toggle');
    Route::post('/statutory_compliance_list', [HealthController::class, 'statutory_compliance_list'])->name('statutory_compliance_list');
    Route::get('/healths/content/{count}/{title}', [HealthController::class, 'content']);

    /* Patient reviews */
    Route::post('/patient_reviews/list', [PatientReviewsController::class, 'list']);
    Route::resource('/patient_reviews', PatientReviewsController::class);

    /* news_and_updates */
    Route::resource('/news_and_updates', NewsAndUpdatesController::class);
    Route::post('/news_and_updates/list', [NewsAndUpdatesController::class, 'list'])->name('news_and_updates.list');

    /* Photo Gallery*/
    Route::post('/photo_gallery/list', [PhotoGalleryController::class, 'list']);
    Route::get('/photo_gallery/status/{id}', [PhotoGalleryController::class, 'status']);
    Route::resource('/photo_gallery', PhotoGalleryController::class);

    Route::get('/gallery_image_all', [GalleryImageController::class, 'all'])->name('gallery_image_all');
    Route::post('/gallery_image/delete', [GalleryImageController::class, 'delete'])->name('gallery_image_delete');
    Route::post('/gallery_image_store/{gallery_id}', [GalleryImageController::class, 'store'])->name('gallery_image_store');

    /*Form_Builder */
    Route::resource('form_builder', FormBuilderController::class);
    Route::post('/form_builder/form_list', [FormBuilderController::class, 'form_list'])->name('form_list');
});
