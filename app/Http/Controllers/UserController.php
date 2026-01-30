<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Quiz;

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
        $quizData = Quiz::where("category_id", $id)->get();
        return view("user-quiz-list", ["quizData" => $quizData, "category" => $category]);
    }
    function userSignUp(Request $request){
        $validation=$request->validate([
            "name"=>"required | min:3",
            "email"=>"required | email",
            "password"=>"required | min:4 | confirmed",

        ]);
    }
}
