<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get("/", [UserController::class, "home"]);
Route::get('user-quiz-list/{id}/{category}', [UserController::class, "userQuizList"]);
Route::get('start-quiz/{id}/{name}', [UserController::class, "startQuiz"]);
// Route::view("user-signup", "user-signup");
Route::post("user-signup", [UserController::class, "userSignUp"]);
Route::get("user-logout", [UserController::class, "userLogOut"]);
Route::get("user-signup-quiz", [UserController::class, "userSignUpQuiz"]);
// Route::view("user-login", "user-login");
Route::post("user-login", [UserController::class, "userLogin"]);
Route::get("user-login",function (){
    if(!Session('user')){
        return view('user-login');
    }else{
        return redirect("/");
    }
});
Route::get("user-signup",function (){
    if(!Session('user')){
        return view('user-signup');
    }else{
        return redirect("/");
    }
});
Route::get("user-login-quiz", [UserController::class, "userLoginQuiz"]);
Route::get("search-quiz", [UserController::class, "searchQuiz"]);
Route::get("verify-user/{email}", [UserController::class, "verifyUser"]);
Route::view("user-forgot-password", "user-forgot-password");
Route::post("user-forgot-password", [UserController::class, "userForgotPassword"]);
Route::get("user-forgot-password/{email}", [UserController::class, "userResetForgotPassword"]);
Route::post("user-set-forgot-password", [UserController::class, "userSetForgotPassword"]);

Route::middleware('CheckUserAuth')->group(function () {
    Route::post("mcq-save-next/{id}", [UserController::class, "mcqSaveNext"]);
    Route::get("user-details", [UserController::class, "userDetails"]);
    Route::get("user-categories", [userController::class, "userCategories"]);
    Route::get("mcq/{id}/{name}", [UserController::class, "mcq"]);
});



Route::view("admin-login", "admin-login");
Route::post("admin-login", [AdminController::class, "login"]);



Route::middleware('CheckAdminAuth')->group(function () {
    Route::get("dashboard", [AdminController::class, "dashboard"]);
    Route::get("admin-categories", [AdminController::class, "categories"]);
    Route::get("admin-logout", [AdminController::class, "logout"]);

    Route::post("add-category", [AdminController::class, "addCategory"]);
    Route::get("category/delete/{id}", [AdminController::class, "deleteCategory"]);
    Route::get("add-quiz", [AdminController::class, "addQuiz"]);
    Route::post("add-mcq", [AdminController::class, "addMCQs"]);
    Route::get("end-quiz", [AdminController::class, "endQuiz"]);;
    Route::get('show-quiz/{id}/{quizName}', [AdminController::class, 'showQuiz']);
    Route::get('quiz-list/{id}/{category}', [AdminController::class, 'quizList']);
});
