<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\JobseekerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/cat', function () {
//     return view('layouts.Categories');
// });



















//form routes for user
Route::get('/',[adminController::class,"fetchCategories"]);
Route::post('/',[jobController::class,"store"]);


// Route::get('/showLoginForm',[jobController::class,"showLoginForm"])->name("userLogin");
// Route::post('/userLoginSubmit',[jobController::class,"login"])->name("userLoginSubmit");

// Route::get('/jobseeker',[JobseekerController::class,'index'])->name('jobseeker_dashboard');



Route::get('refresh-captcha', [jobController::class,'refreshCaptcha'])->name('refreshCaptcha');
//Here All are admin routes that are related to admin panel 
Auth::routes();
Route::group(["middleware" => "auth"] , function()
{
    Route::get('/admin',[adminController::class,'display'])->name("admin_dashboard");

    Route::get('/export', [adminController::class, 'export'])->name('export');
    Route::get('/logout', [adminController::class, 'logout'])->name('logout');

    Route::post('/send-email', [MailController::class, 'sendEmail'])->name('send-email');

    Route::get('/delete/{id}', [adminController::class, 'delete'])->name('job.delete');
    Route::get('/edit/{id}', [adminController::class, 'edit'])->name('users.edit');
    Route::post('/update/{id}', [adminController::class, 'updateForm'])->name('users.update');

    Route::post('/approve/{id}', [adminController::class,'approved'])->name('approve');
    Route::get('/approved', [adminController::class, 'shortlistedJobs'])->name('shortlisted');
    Route::get('/hire-list', [adminController::class, 'hireList'])->name('hiring');
    Route::post('/hired/{id}', [adminController::class,'hired'])->name('hired');

    Route::post('/selectedFOrJob/{id}', [adminController::class,'Employee'])->name('employee');
    Route::post('/selected/{id}', [adminController::class,'hireForJOb'])->name('hireForJOb');



    Route::get('/web-dev', [adminController::class, 'WebDevelopers'])->name('webDev');
    Route::get('/app-dev', [adminController::class, 'AppDevelopers'])->name('AppDev');
    Route::get('/hr-manage', [adminController::class, 'HR'])->name('hr-manage');
    Route::get('/quality-assurance', [adminController::class, 'QualityAssurance'])->name('quality');
    Route::get('/marketing', [adminController::class, 'marketing'])->name('marketing');
    Route::get('/commerce-finance', [adminController::class, 'commerce'])->name('commerce');
    Route::get('/project-management', [adminController::class, 'project'])->name('project');
    Route::get('/other-management', [adminController::class, 'other'])->name('other');
    Route::get('/other-management', [adminController::class, 'other'])->name('other');
    Route::post('/category', [adminController::class, 'Categories']);

    Route::get('/category', [adminController::class, 'showCategories'])->name('categorie');

    Route::get('/cat',[adminController::class,"showCategories"])->name('show');

    Route::post('/submit',[adminController::class,"Categories"])->name('categories');


    Route::post('/message',[adminController::class,"Message"])->name('message');

    Route::post('/delete-expired-messages', [adminController::class,"deleteExpiredMessages"])->name('delete.expired.messages');
    

    Route::post('/messagetoAll',[adminController::class,"MessageToAll"])->name('messagetoAll');

  //user dashboard routes
Route::get('/jobseeker',[JobseekerController::class,'index'])->name('jobseeker_dashboard');



    
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
