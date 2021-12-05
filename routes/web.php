<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cartviewcontroller;
use App\Http\Controllers\detailscontroller;
use App\Http\Controllers\Finandashbordcontroller;
use App\Http\Controllers\TeacherSalarycontroller;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentReportConroller;
use Illuminate\Support\Facades\DB;

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
Route::get('/', function () {
    return view('welcome');
});
//adminmain


Route::get('/adminmain', function () {
    return view('adminmainhome');
});


Route::resource('/cartview',Cartviewcontroller::class);

Route::resource('details',detailscontroller::class);

Route::resource('financial',Finandashbordcontroller::class);

Route::get('payment',[detailscontroller::class,'addPaymentinfo']);

Route::post('payment',[detailscontroller::class,'storepaymentinfo'])->name('details.store');

Route::get('paymentsummary',[detailscontroller::class,'payment']);

Route::get('edit_payment_info/{id}',[detailscontroller::class,'editpaymentinfo']);

Route::post('update_payment_info',[detailscontroller::class,'updatepaymentinfo'])->name('details.update');

Route::get('paymentsuccess',[detailscontroller::class,'success']);

Route::get('/search',[detailscontroller::class,'search']);

Route::resource('salary',TeacherSalarycontroller::class);

Route::get('teachsalary',[TeacherSalarycontroller::class,'addsalaryinfo']);

Route::post('teachsalary',[TeacherSalarycontroller::class,'addsalaryinfo'])->name('teachersalary.store');

Route::get('/edit_student/{id}',[TeacherSalarycontroller::class,'editsalary']);

Route::post('/update_salary_info',[TeacherSalarycontroller::class,'updatesalary'])->name('teachsalary.update');

Route::get('/search-teacher',[TeacherSalarycontroller::class,'searchteacher']);

Route::get('/foot', function () {
    return view('footer');
});


Route::get('/message',[MessageController::class,'message']);

Route::post('/email_send',[MessageController::class,'sendEmail'])->name('message.send');

Route::get('/report',[PaymentReportConroller::class,'getAllReport']);

Route::get('/reportdownload',[PaymentReportConroller::class,'report']);

Route::get('/home', function () {
    return view('home');
});













