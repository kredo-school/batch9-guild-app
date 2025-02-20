<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\FreelanceController;
//company
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Company\ProjectController;
use App\Http\Controllers\Company\EvaluationController;
use App\Http\Controllers\Company\MessageController;

//freelancer



// create front
//admin

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});



//company
Route::middleware(['company'])->prefix('company')->name('company.')->group(function () {

        Route::get('/', [CompanyController::class, 'index'])->name('dashboard');
        Route::get('/project', [ProjectController::class, 'index'])->name('project');
        Route::post('/create', [ProjectController::class, 'create'])->name('create');
        
        Route::get('/profile/{id}/', [App\Http\Controllers\Company\ProfileController::class, 'show'])->name('profile');
        Route::get('/profile/{id}/edit', [App\Http\Controllers\Company\ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/update', [App\Http\Controllers\Company\ProfileController::class, 'update'])->name('profile.update');

        Route::delete('/delete/{id}', [ProjectController::class, 'delete'])->name('delete');
        Route::get('/evaluation', [EvaluationController::class, 'index'])->name('evaluation');
        Route::post('/evaluate', [EvaluationController::class, 'store'])->name('store');
        Route::get('/message/{id}/show', [MessageController::class, 'index'])->name('message');
        Route::POST('/message/{id}/store', [MessageController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',[ProjectController::class, 'update'])->name('update');
    });


// ユーザーがメール内のリンクをクリックしたときの処理
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    $user = $request->user();

    if($user->role_id == 2){
        return redirect()->route('company.dashboard');
    }elseif($user->role_id == 3){
        return redirect()->route('freelancer.index'); // 認証成功後のリダイレクト先
    }

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');




//freelancer
Route::middleware(['freelancer', 'auth', 'verified'])->prefix('freelancer')->name('freelancer.')->group(function(){
    // Dashboard
    Route::get('/user-dashboard', [FreelanceController::class, 'index'])->name('index');
    Route::get('/todo-list/edit', [FreelanceController::class, 'editTodo'])->name('todo-edit');
    Route::post('/todo-list/store', [FreelanceController::class, 'store'])->name('todo.store');


    //Freelancer Profile
    Route::get('/profile/{id}/show', [App\Http\Controllers\Freelancer\ProfileController::class, 'show'])->name('profile');
    Route::get('/freelancer/profile/{id}/edit', [App\Http\Controllers\Freelancer\ProfileController::class, 'edit'])->name('profile-edit');
    Route::post('/freelancer/profile/update', [App\Http\Controllers\Freelancer\ProfileController::class, 'update'])->name('profile-update');

    //Project
    Route::get('/project-list', [App\Http\Controllers\Freelancer\ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/{id}/project-details', [App\Http\Controllers\Freelancer\ProjectController::class, 'show'])->name('project-details');
    Route::post('/project/comment/store', [App\Http\Controllers\Freelancer\ProjectController::class, 'store'])->name('comment.store');
    Route::post('/project/{project}/favorite', [App\Http\Controllers\Freelancer\ProjectController::class, 'favorite'])->name('project.favorite');

    // Project Status
    Route::get('/project/{id}/request', [App\Http\Controllers\Freelancer\ProjectController::class, 'request'])->name('project.request');
    Route::get('/project/{id}/cancel-request', [App\Http\Controllers\Freelancer\ProjectController::class, 'cancelRequest'])->name('project.cancel-request');
    Route::get('/project/{id}/start', [App\Http\Controllers\Freelancer\ProjectController::class, 'start'])->name('project.start');
    Route::get('/project/{id}/reject-acknowledge', [App\Http\Controllers\Freelancer\ProjectController::class, 'rejectAcknowledge'])->name('project.acknowledge');
    Route::get('/project/{id}/submit', [App\Http\Controllers\Freelancer\ProjectController::class, 'submit'])->name('project.submit');
    Route::get('/project/{id}/result', [App\Http\Controllers\Freelancer\ProjectController::class, 'result'])->name('project.result');

    //message
    Route::get('/message/{id}/show', [App\Http\Controllers\Freelancer\MessageController::class, 'index'])->name('message.index');
    Route::post('/message/{id}/store', [App\Http\Controllers\Freelancer\MessageController::class, 'store'])->name('message.store');
});



//admin
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function(){
        return redirect()->route('admin.freelancer');
    })
    ->name('dashboard');

    Route::get('freelancer', [App\Http\Controllers\Admin\DashboardController::class, 'getAllFreelancers'])->name('freelancer');
    Route::delete('/freelancer/{id}/deactivate', [App\Http\Controllers\Admin\DashboardController::class, 'deactivate'])->name('freelancer.deactivate');
    Route::patch('/freelancer/{id}/activate', [App\Http\Controllers\Admin\DashboardController::class, 'activate'])->name('freelancer.activate');

    Route::get('company', [App\Http\Controllers\Admin\DashboardController::class, 'getAllCompanies'])->name('company');
    Route::delete('/company/{id}/deactivate', [App\Http\Controllers\Admin\DashboardController::class, 'deactivateCompany'])->name('company.deactivate');
    Route::patch('/company/{id}/activate', [App\Http\Controllers\Admin\DashboardController::class, 'activateCompany'])->name('company.activate');

    Route::get('project', [App\Http\Controllers\Admin\DashboardController::class, 'getAllProjects'])->name('project');
    Route::delete('/project/{id}/deactivate', [App\Http\Controllers\Admin\DashboardController::class, 'deactivateProject'])->name('project.deactivate');
    Route::patch('/project/{id}/activate', [App\Http\Controllers\Admin\DashboardController::class, 'activateProject'])->name('project.activate');

    Route::get('transaction', [App\Http\Controllers\Admin\DashboardController::class, 'getAllTransactions'])->name('transaction');

    Route::view('message', 'admins.message')->name('admin.message');
});
