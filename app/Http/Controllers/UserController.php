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


    function startQuiz($id,$name){
        $quizCount= Mcq::where("quiz_id",$id)->count();
        return view("start-quiz",["quizCount"=>$quizCount,"quizName"=>$name]);
    }

    function userSignUp(Request $request){
        $validation=$request->validate([
            "name"=>"required | min:3",
            "email"=>"required | email | unique:users",
            "password"=>"required | min:4 | confirmed",

        ]);
        $user=User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
          
        ]);
        if($user){
            Session::put('user',$user);
            return redirect("/");
        }
    }
}
