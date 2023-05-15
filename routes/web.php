<?php

use App\Http\Controllers\Admin\AdminApplicantController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminCvController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminOfferController;
use App\Http\Controllers\Admin\AdminUggCityController;
use App\Http\Controllers\Admin\AdminUggController;
use App\Http\Controllers\Admin\AdminUggEmailsController;
use App\Http\Controllers\Admin\AdminUggFormController;
use App\Http\Controllers\Admin\AdminUggSessionController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CurriculumVitaeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UggController;
use App\Http\Controllers\UggFormController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/de');

Route::group([
    'prefix' => '{language}',
    'middleware' => 'prevent-back-history'
], function () {

    Route::get('/', function ($language) {

        if(!in_array($language, ['de', 'en', 'fr'])){
            return redirect('/');
        }
        return view('welcome', ['navigation' => 'welcome']);
    })->name('welcome');

    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::post('/company', [CompanyController::class, 'store'])->name('store.company');

    Route::get('/applicant/dashboard/{section?}/{section_2?}/{section_3?}', [ApplicantController::class, 'dashboard'])->middleware(['auth'])->name('applicant.dashboard');
    Route::get('/applicant/login', [ApplicantController::class, 'login'])->middleware(['guest'])->name('applicant.login');
    Route::post('/applicant/login', [ApplicantController::class, 'authenticate'])->middleware(['guest'])->name('applicant.login.authenticate');
    Route::get('/applicant/logout', [ApplicantController::class, 'logout'])->middleware(['auth'])->name('applicant.logout');
    Route::get('/applicant/register', [ApplicantController::class, 'register'])->middleware(['guest'])->name('applicant.register');
    Route::post('/applicant/register', [ApplicantController::class, 'store'])->middleware(['guest'])->name('applicant.register.store');

    Route::post('/applicant/send/contact/message', [ApplicantController::class, 'sendContactMessage'])->name('send-contact-message');

    Route::get('/applicant/password/forgot/email', [ApplicantController::class, 'passwordForgotEmail'])->middleware(['guest'])->name('applicant.password.forgot.email');
    Route::post('/applicant/password/forgot/email', [ApplicantController::class, 'passwordForgotEmailRequest'])->middleware(['guest'])->name('applicant.password.forgot.email.request');
    Route::get('/applicant/reset/password/{reset_password_token}', [ApplicantController::class, 'passwordReset'])->middleware(['guest'])->name('applicant.password.reset');
    Route::post('/applicant/reset/password/{reset_password_token}', [ApplicantController::class, 'passwordResetStore'])->middleware(['guest'])->name('applicant.password.reset.store');
    Route::post('/applicant/change/password/from/account', [ApplicantController::class, 'passwordChangeFromAccount'])->middleware(['auth'])->name('applicant.password.change.from.account');

    Route::get('/applicant/verify/email/{activation_token}', [ApplicantController::class, 'verify_email'])->middleware(['guest'])->name('applicant.verify.email');

    /* UGG */
    Route::get('/kodreams', [UggController::class, 'index'])->name('ugg.kodreams');
    Route::get('/kodreams/dashboard/{section?}/{section_2?}', [UggController::class, 'dashboard'])->middleware(['auth-ugg'])->name('ugg.dashboard');
    Route::get('/kodreams/login', [UggController::class, 'login'])->middleware(['guest'])->name('ugg.login');
    Route::post('/kodreams/login', [UggController::class, 'authenticate'])->middleware(['guest'])->name('ugg.login.authenticate');
    Route::get('/kodreams/logout', [UggController::class, 'logout'])->middleware(['auth-ugg'])->name('ugg.logout');
    Route::get('/kodreams/register', [UggController::class, 'register'])->middleware(['guest'])->name('ugg.register');
    Route::post('/kodreams/register', [UggController::class, 'store'])->middleware(['guest'])->name('ugg.register.store');
    Route::get('/kodreams/password/forgot/email', [UggController::class, 'passwordForgotEmail'])->middleware(['guest'])->name('ugg.password.forgot.email');
    Route::post('/kodreams/password/forgot/email', [UggController::class, 'passwordForgotEmailRequest'])->middleware(['guest'])->name('ugg.password.forgot.email.request');
    Route::get('/kodreams/reset/password/{reset_password_token}', [UggController::class, 'passwordReset'])->middleware(['guest'])->name('ugg.password.reset');
    Route::post('/kodreams/reset/password/{reset_password_token}', [UggController::class, 'passwordResetStore'])->middleware(['guest'])->name('ugg.password.reset.store');
    Route::post('/kodreams/change/password/from/account', [UggController::class, 'passwordChangeFromAccount'])->middleware(['auth-ugg'])->name('ugg.password.change.from.account');
    Route::get('/kodreams/verify/email/{activation_token}', [UggController::class, 'verify_email'])->middleware(['guest'])->name('ugg.verify.email');

    Route::get('/impressum', function () {
        return view('impressum', ['navigation' => 'impressum']);
    })->name('impressum');

    Route::get('/news', [NewsController::class, 'index'])->name('news');

    Route::post('/applicant/create/education', [EducationController::class, 'store'])->middleware(['auth', 'cors']);
    Route::post('/applicant/get/education', [EducationController::class, 'get_education'])->middleware(['auth', 'cors']);
    Route::post('/applicant/update/education', [EducationController::class, 'update'])->middleware(['auth', 'cors']);
    Route::post('/applicant/delete/education', [EducationController::class, 'delete'])->middleware(['auth', 'cors']);

    Route::post('/applicant/create/work', [WorkController::class, 'store'])->middleware(['auth', 'cors']);
    Route::post('/applicant/get/work', [WorkController::class, 'get_work'])->middleware(['auth', 'cors']);
    Route::post('/applicant/update/work', [WorkController::class, 'update'])->middleware(['auth', 'cors']);
    Route::post('/applicant/update/work/position', [WorkController::class, 'update_position'])->middleware(['auth', 'cors']);
    Route::post('/applicant/delete/work', [WorkController::class, 'delete'])->middleware(['auth', 'cors']);

    Route::post('/applicant/create/skill', [SkillController::class, 'store'])->middleware(['auth', 'cors']);
    Route::post('/applicant/get/skill', [SkillController::class, 'get_skill'])->middleware(['auth', 'cors']);
    Route::post('/applicant/update/skill', [SkillController::class, 'update'])->middleware(['auth', 'cors']);
    Route::post('/applicant/update/skill/position', [SkillController::class, 'update_position'])->middleware(['auth', 'cors']);
    Route::post('/applicant/delete/skill', [SkillController::class, 'delete'])->middleware(['auth', 'cors']);

    Route::post('/applicant/create/language', [LanguageController::class, 'store'])->middleware(['auth', 'cors']);
    Route::post('/applicant/get/language', [LanguageController::class, 'get_language'])->middleware(['auth', 'cors']);
    Route::post('/applicant/update/language', [LanguageController::class, 'update'])->middleware(['auth', 'cors']);
    Route::post('/applicant/update/language/position', [LanguageController::class, 'update_position'])->middleware(['auth', 'cors']);
    Route::post('/applicant/delete/language', [LanguageController::class, 'delete'])->middleware(['auth', 'cors']);

    Route::post('/applicant/create/hobby', [HobbyController::class, 'store'])->middleware(['auth', 'cors']);
    Route::post('/applicant/get/hobby', [HobbyController::class, 'get_hobby'])->middleware(['auth', 'cors']);
    Route::post('/applicant/update/hobby', [HobbyController::class, 'update'])->middleware(['auth', 'cors']);
    Route::post('/applicant/update/hobby/position', [HobbyController::class, 'update_position'])->middleware(['auth', 'cors']);
    Route::post('/applicant/delete/hobby', [HobbyController::class, 'delete'])->middleware(['auth', 'cors']);

    Route::post('/applicant/store/cv', [CurriculumVitaeController::class, 'store'])->middleware(['auth'])->name('applicant.store.cv');
    Route::post('/applicant/update/cv/{id}', [CurriculumVitaeController::class, 'update'])->middleware(['auth'])->name('applicant.update.cv');
    Route::post('/applicant/send/final/cv', [CurriculumVitaeController::class, 'sendFinalCv'])->middleware(['auth'])->name('applicant.send.final.cv');

    Route::post('/applicant/cv/image/upload', [CurriculumVitaeController::class, 'imageUpload'])->middleware(['auth']);
    Route::post('/applicant/cv/image/delete', [CurriculumVitaeController::class, 'imageDelete'])->middleware(['auth']);
    Route::post('/applicant/cv/image/delete/path', [CurriculumVitaeController::class, 'imageDeletePath'])->middleware(['auth']);

    Route::post('/applicant/cv/document/store', [DocumentController::class, 'store'])->middleware(['auth'])->name('applicant.document.store');
    Route::get('/applicant/cv/document/delete/{id}', [DocumentController::class, 'delete'])->middleware(['auth'])->name('applicant.document.delete');
    Route::post('/applicant/cv/document/upload', [DocumentController::class, 'documentUpload'])->middleware(['auth']);
    Route::post('/applicant/cv/document/delete', [DocumentController::class, 'documentDelete'])->middleware(['auth']);


    Route::post('/kodreams/store/form', [UggFormController::class, 'store'])->middleware(['auth-ugg'])->name('ugg.store.form');
    Route::post('/kodreams/update/form/{id}', [UggFormController::class, 'update'])->middleware(['auth-ugg'])->name('ugg.update.form');
    Route::get('/kodreams/delete/picture/{id}', [UggFormController::class, 'deletePicture'])->middleware(['auth-ugg'])->name('ugg.delete.picture');
    Route::post('/kodreams/send/final/form', [UggFormController::class, 'sendFinalForm'])->middleware(['auth-ugg'])->name('ugg.send.final.form');

    Route::post('/kodreams/pdf/upload', [UggController::class, 'pdfUpload'])->middleware(['auth-ugg'])->name('ugg.pdf.upload');

    Route::post('/ugg/get/cities', [AdminUggCityController::class, 'getUggCities'])->middleware(['auth-ugg']);

//    Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->middleware(['auth-ugg'])->name('generate.pdf');

//    Route::get('test-date', function () {
//        dd(date('d.m.Y') >= config('app.kodream_start_date'), date('d.m.Y'), config('app.kodream_start_date'));
//    });
    Route::controller(StripePaymentController::class)->middleware(['auth'])->group(function(){
        Route::get('stripe', 'stripe')->name('ugg.stripe');
        Route::post('stripe', 'stripePost')->name('stripe.post');
    });

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', AdminDashboardController::class)->middleware(['admin'])->name('admin.dashboard');

        Route::get('/login', [AdminAuthController::class, 'index'])->middleware(['guest'])->name('admin');
        Route::post('/login', [AdminAuthController::class, 'authenticate'])->middleware(['guest'])->name('admin.login');
        Route::get('/logout', [AdminAuthController::class, 'logout'])->middleware(['admin'])->name('admin.logout');

        Route::get('/companies', [AdminCompanyController::class, 'index'])->middleware(['admin'])->name('admin.companies');
        Route::get('/companies/create', [AdminCompanyController::class, 'create'])->middleware(['admin'])->name('admin.companies.create');
        Route::post('/companies/store', [AdminCompanyController::class, 'store'])->middleware(['admin'])->name('admin.companies.store');
        Route::get('/companies/edit/{id}', [AdminCompanyController::class, 'edit'])->middleware(['admin'])->name('admin.companies.edit');
        Route::post('/companies/update/{company}', [AdminCompanyController::class, 'update'])->middleware(['admin'])->name('admin.companies.update');
        Route::get('/companies/delete/{company}', [AdminCompanyController::class, 'delete'])->middleware(['admin'])->name('admin.companies.delete');

        Route::get('/offers', [AdminOfferController::class, 'index'])->middleware(['admin'])->name('admin.offers');
        Route::get('/offers/create', [AdminOfferController::class, 'create'])->middleware(['admin'])->name('admin.offers.create');
        Route::post('/offers/store', [AdminOfferController::class, 'store'])->middleware(['admin'])->name('admin.offers.store');
        Route::get('/offers/edit/{id}', [AdminOfferController::class, 'edit'])->middleware(['admin'])->name('admin.offers.edit');
        Route::post('/offers/update/{offer}', [AdminOfferController::class, 'update'])->middleware(['admin'])->name('admin.offers.update');
        Route::get('/offers/delete/{offer}', [AdminOfferController::class, 'delete'])->middleware(['admin'])->name('admin.offers.delete');

        Route::get('/cv', [AdminCvController::class, 'index'])->middleware(['admin'])->name('admin.cv');
        Route::get('/cv/view/{id}', [AdminCvController::class, 'view'])->middleware(['admin'])->name('admin.cv.view');
        Route::get('/cv/delete/{curriculum_vitae}', [AdminCvController::class, 'delete'])->middleware(['admin'])->name('admin.cv.delete');

        Route::get('/applicant', [AdminApplicantController::class, 'index'])->middleware(['admin'])->name('admin.applicant');
        Route::get('/applicant/edit/{id}', [AdminApplicantController::class, 'edit'])->middleware(['admin'])->name('admin.applicant.edit');
        Route::post('/applicant/update/{applicant}', [AdminApplicantController::class, 'update'])->middleware(['admin'])->name('admin.applicant.update');
        Route::get('/applicant/delete/{applicant}', [AdminApplicantController::class, 'delete'])->middleware(['admin'])->name('admin.applicant.delete');

        Route::get('/kodreams', [AdminUggController::class, 'index'])->middleware(['admin'])->name('admin.ugg');
        Route::get('/kodreams/edit/{id}', [AdminUggController::class, 'edit'])->middleware(['admin'])->name('admin.ugg.edit');
        Route::post('/kodreams/update/{ugg}', [AdminUggController::class, 'update'])->middleware(['admin'])->name('admin.ugg.update');
        Route::get('/kodreams/delete/{ugg}', [AdminUggController::class, 'delete'])->middleware(['admin'])->name('admin.ugg.delete');

        Route::get('/kodreams-form/{session?}/{city?}/{status?}/{exam_language?}/{gender?}', [AdminUggFormController::class, 'index'])->middleware(['admin'])->name('admin.ugg.form');
        Route::get('/kodreams/form/view/{id}', [AdminUggFormController::class, 'view'])->middleware(['admin'])->name('admin.ugg.form.view');
        Route::post('/kodreams-form/set/search', [AdminUggFormController::class, 'setSearch'])->middleware(['admin'])->name('admin.ugg.form.set.search');
        Route::get('/kodreams-form/delete/{ugg_form}', [AdminUggFormController::class, 'delete'])->middleware(['admin'])->name('admin.ugg.form.delete');
        Route::get('/kodreams/set-status/{ugg_id}/{status}', [AdminUggFormController::class, 'setStatus'])->middleware(['admin'])->name('admin.ugg.set.status');
        Route::post('/kodreams/change-status/{ugg_id}', [AdminUggFormController::class, 'changeStatus'])->middleware(['admin'])->name('admin.ugg.change.status');
        Route::post('/kodreams/set-note/{ugg_id}', [AdminUggFormController::class, 'setNote'])->middleware(['admin'])->name('admin.ugg.set.note');
        Route::get('/kodreams/regenerate-pdf/{ugg_form_id}', [AdminUggFormController::class, 'regeneratePDF'])->middleware(['admin'])->name('admin.ugg.regenerate.pdf');

        Route::get('/kodreams/sessions', [AdminUggSessionController::class, 'index'])->middleware(['admin'])->name('admin.ugg.sessions');
        Route::get('/kodreams/sessions/create', [AdminUggSessionController::class, 'create'])->middleware(['admin'])->name('admin.ugg.sessions.create');
        Route::post('/kodreams/sessions/store', [AdminUggSessionController::class, 'store'])->middleware(['admin'])->name('admin.ugg.sessions.store');
        Route::get('/kodreams/sessions/edit/{id}', [AdminUggSessionController::class, 'edit'])->middleware(['admin'])->name('admin.ugg.sessions.edit');
        Route::post('/kodreams/sessions/update/{ugg_session}', [AdminUggSessionController::class, 'update'])->middleware(['admin'])->name('admin.ugg.sessions.update');
        Route::get('/kodreams/sessions/delete/{ugg_session}', [AdminUggSessionController::class, 'delete'])->middleware(['admin'])->name('admin.ugg.sessions.delete');

        Route::get('/kodreams-cities/{ugg_session_id?}', [AdminUggCityController::class, 'index'])->middleware(['admin'])->name('admin.ugg.cities');
        Route::get('/kodreams/cities/create', [AdminUggCityController::class, 'create'])->middleware(['admin'])->name('admin.ugg.cities.create');
        Route::post('/kodreams/cities/store', [AdminUggCityController::class, 'store'])->middleware(['admin'])->name('admin.ugg.cities.store');
        Route::get('/kodreams/cities/edit/{id}', [AdminUggCityController::class, 'edit'])->middleware(['admin'])->name('admin.ugg.cities.edit');
        Route::post('/kodreams/cities/update/{ugg_city}', [AdminUggCityController::class, 'update'])->middleware(['admin'])->name('admin.ugg.cities.update');
        Route::get('/kodreams/cities/delete/{ugg_city}', [AdminUggCityController::class, 'delete'])->middleware(['admin'])->name('admin.ugg.cities.delete');
        Route::post('/kodreams/kodreams/cities/set/search', [AdminUggCityController::class, 'setSearch'])->middleware(['admin'])->name('admin.ugg.cities.set.search');

        Route::get('/kodreams/emails', [AdminUggEmailsController::class, 'index'])->middleware(['admin'])->name('admin.ugg.emails');
        Route::post('/kodreams/emails', [AdminUggEmailsController::class, 'send'])->middleware(['admin'])->name('admin.ugg.send');

        Route::get('/news', [AdminNewsController::class, 'index'])->middleware(['admin'])->name('admin.news');
        Route::get('/news/create', [AdminNewsController::class, 'create'])->middleware(['admin'])->name('admin.news.create');
        Route::post('/news/store', [AdminNewsController::class, 'store'])->middleware(['admin'])->name('admin.news.store');
        Route::get('/news/edit/{id}', [AdminNewsController::class, 'edit'])->middleware(['admin'])->name('admin.news.edit');
        Route::post('/news/update/{new}', [AdminNewsController::class, 'update'])->middleware(['admin'])->name('admin.news.update');
        Route::get('/news/delete/{new}', [AdminNewsController::class, 'delete'])->middleware(['admin'])->name('admin.news.delete');
        Route::get('/news/delete/picture/{picture}', [AdminNewsController::class, 'deletePicture'])->middleware(['admin'])->name('admin.news.delete.picture');
        Route::get('/news/delete/document/{document}', [AdminNewsController::class, 'deleteDocument'])->middleware(['admin'])->name('admin.news.delete.document');

        Route::get('/users', [AdminUsersController::class, 'index'])->middleware(['admin'])->name('admin.users');
        Route::get('/users/create', [AdminUsersController::class, 'create'])->middleware(['admin'])->name('admin.users.create');
        Route::post('/users/store', [AdminUsersController::class, 'store'])->middleware(['admin'])->name('admin.users.store');
        Route::get('/users/edit/{id}', [AdminUsersController::class, 'edit'])->middleware(['admin'])->name('admin.users.edit');
        Route::post('/users/update/{user}', [AdminUsersController::class, 'update'])->middleware(['admin'])->name('admin.users.update');
        Route::get('/users/delete/{user}', [AdminUsersController::class, 'delete'])->middleware(['admin'])->name('admin.users.delete');
    });

});
