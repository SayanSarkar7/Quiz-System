<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Mcq;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    //
    function home()
    {
        $categories = Category::withCount("quizzes")->get();
        return view("welcome", ['categories' => $categories]);
    }

    function userQuizList($id, $category)
    {
        $quizData = Quiz::withCount("Mcq")->where("category_id", $id)->get();
        return view("user-quiz-list", ["quizData" => $quizData, "category" => $category]);
    }


    function startQuiz($id, $name)
    {
        $quizCount = Mcq::where("quiz_id", $id)->count();
        $mcqs = Mcq::where("quiz_id", $id)->get();
        Session::put("firstMCQ", $mcqs[0]);
        return view("start-quiz", ["quizCount" => $quizCount, "quizName" => $name]);
    }

    function userSignUp(Request $request)
    {
        $validation = $request->validate([
            "name" => "required | min:3",
            "email" => "required | email | unique:users",
            "password" => "required | min:4 | confirmed",

        ]);
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),

        ]);
        if ($user) {
            Session::put('user', $user);
            if (Session::has("quiz-url")) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url);
            }
            return redirect("/");
        }
    }
    function userLogOut()
    {
        Session::forget('user');
        return redirect("/");
    }
    function userSignUpQuiz()
    {
        Session::put("quiz-url", url()->previous());
        return view("user-signup");
    }
    function userLogin(Request $request)
    {
        $validation = $request->validate([
            "email" => "required | email ",
            "password" => "required",

        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return "User not valid, Please check user and password again";
        }
        if ($user) {
            Session::put('user', $user);
            if (Session::has("quiz-url")) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url);
            }
            return redirect("/");
        }
    }
    function userLoginQuiz()
    {
        Session::put("quiz-url", url()->previous());
        return view("user-login");
    }
    function mcq($id, $name)
    {
       return view("mcq-page");
    }
}
