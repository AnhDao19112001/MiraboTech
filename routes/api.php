<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryAllController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourserController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\QAndAsController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\ShakehandController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UrgentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function() {
    Route::post('/admin/register', 'register');
    Route::post('/admin/login', 'login');
    Route::get('/admin/get-me','getMe')->middleware('auth:api');
});

Route::controller(NewsController::class)->group(function() {
    Route::post('/admin/news/new','createNews');
    Route::get('/admin/news/{id}', 'findById');
    Route::put('/admin/news/{id}/edit', 'updateNews');
    Route::get('/admin/news','index');
});

Route::controller(SchoolsController::class)->group(function() {
    Route::get('/admin/school', 'storeList');
    Route::get('/admin/school/{id}', 'findById');
    Route::put('/admin/school/{id}/edit', 'updateSchool');
});

Route::controller(CategoryController::class)->group(function() {
    Route::get('/admin/category', 'indexCategory');
});

Route::controller(StatusController::class)->group(function() {
    Route::get('/admin/status', 'indexStatus');
});

Route::controller(TopicController::class)->group(function() {
    Route::post('/admin/school/{id}/topics/new', 'createTopic');
    Route::get('/admin/school/{schoolId}/topics/{id}/detail','findById');
    Route::put('/admin/school/{schoolId}/topics/{id}/edit', 'updateTopic');
});

Route::controller(UrgentController::class)->group(function() {
    Route::put('/admin/school/{schoolIds}/urgent/edit', 'updateUrgent');
});

Route::controller(QAndAsController::class)->group(function() {
    Route::get('/admin/qanda', 'findAll');
    Route::post('/admin/qanda/create', 'createQAndAs');
    Route::get('/admin/qanda/{id}', 'findById');
    Route::put('/admin/qanda/{id}', 'updateQAndA');
});

Route::controller(PurposeController::class)->group(function() {
    Route::get('/admin/purpose', 'indexStatus');
    Route::post('/admin/purpose/create', 'createPurpose');
    Route::get('/admin/purpose/{id}', 'findById');
    Route::put('/admin/purpose/{id}', 'updatePurpose');
});

Route::controller(DescriptionController::class)->group(function() {
    Route::get('/admin/category/description/{id}','findById');
    Route::get('/admin/category/description', 'selectAll');
});

Route::controller(CategoryAllController::class)->group(function() {
    Route::get('/admin/shakehand/category{id}', 'findId');
    Route::get('/admin/shakehand/category', 'indexCategory');
    Route::put('/admin/shakehand/category{id}/edit', 'updateCategory');
    Route::delete('/admin/shakehand/category{id}', 'deleteCategory');
});

Route::controller(MessageController::class)->group(function() {
    Route::get('/admin/message', 'index');
});

Route::controller(CourserController::class)->group(function() {
    Route::get('/admin/school/{schoolId}/course/{id}','getById');
    Route::get('/admin/course','searchCourses');
});

Route::controller(LecturerController::class)->group(function() {
    Route::get('/admin/leturer/{id}', 'findById');
    Route::put('/admin/leturer/{id}', 'updateLeturer');
});

Route::controller(SpecialController::class)->group(function() {
    Route::get('/admin/special', 'selectAll');
    Route::post('/admin/special/new', 'createSpecial');
    Route::get('/admin/special/{id}', 'findById');
    Route::put('/admin/special/{id}/edit', 'updateSpecial');
});

Route::controller(ShakehandController::class)->group(function() {
    Route::get('/admin/shakehand', 'selectAll');
    Route::post('/admin/shakehand/new', 'createShakehand');
    Route::get('/admin/shakehand/{id}', 'findById');
    Route::put('/admin/shakehand/{id}/edit', 'updateShakehand');
});
