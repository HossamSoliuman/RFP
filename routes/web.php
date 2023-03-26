<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PresalesController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register'=>false]);
Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('admin')->middleware(['auth','isAdmin'])->name('admin.')->group(function(){

    Route::get('/profile',[AdminController::class,'index'])->name('profile');
    Route::get('/add_user',[AdminController::class,'add_user'])->name('add_user');
    Route::get('/show_users',[AdminController::class,'show_users'])->name('show_users');
    Route::get('/delete_user/{id}',[AdminController::class,'delete_user'])->name('delete_user');
    Route::get('/add_presales',[AdminController::class,'add_presales'])->name('add_presales');
    Route::get('/show_tickets',[AdminController::class,'show_tickets'])->name('show_tickets');
    Route::get('/request_details/{ticket_name}',[AdminController::class,'request_details'])->name('request_details');
    Route::get('/show_proposal/{ticket_name}',[AdminController::class,'show_proposal'])->name('show_proposal');
    Route::post('/create_user',[AdminController::class,'create_user'])->name('create_user');
    Route::post('/create_presales',[AdminController::class,'create_presales'])->name('create_presales');
    Route::get('/create_questionnaire',[AdminController::class,'create_questionnaire'])->name('create_questionnaire');
    Route::post('/store_questionnaire',[AdminController::class,'store_questionnaire'])->name('store_questionnaire');
});
Route::prefix('presales')->middleware(['auth','isPresalesMember'])->group(function(){
   Route::get('/profile',[PresalesController::class,'index'])->name('presales.profile');
   Route::get('/requests',[PresalesController::class,'requests'])->name('presales.requests');
   Route::get('/request_details/{ticket_name}',[PresalesController::class,'request_details'])->name('presales.request_details');
   Route::get('/create_proposal/{ticket_name}',[PresalesController::class,'create_proposal'])->name('prsales.create_proposal');
   Route::post('/store_proposal',[PresalesController::class,'store_proposal'])->name('presales.store_proposal');
   Route::get('/follow_ticket',[PresalesController::class,'follow_ticket'])->name('presales.follow_ticket');
});
Route::prefix('sales')->middleware(['auth','isSalesMember'])->group(function(){
    Route::get('/profile',[SalesController::class,'index'])->name('sales.profile');
    Route::get('/create_ticket',[SalesController::class,'create_ticket'])->name('sales.create_ticket');
    Route::get('/follow_ticket',[SalesController::class,'follow_ticket'])->name('sales.follow_ticket');
    Route::get('/review_proposal/{ticket_name}',[SalesController::class,'review_proposal'])->name('sales.review_proposal');
    Route::post('/show_questions',[SalesController::class,'show_questions'])->name('sales.show_questions');
    Route::post('/make_request',[SalesController::class,'make_request'])->name('sales.make_request');
    Route::post('/store_review',[SalesController::class,'store_review'])->name('sales.store_review');
    Route::post('/approve/{ticket_name}',[SalesController::class,'approve'])->name('sales.approve');
    Route::post('/close/{ticket_name}',[SalesController::class,'close'])->name('sales.close');
});
