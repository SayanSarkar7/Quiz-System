<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Mcq;
use App\Models\Quiz;
use App\Models\Record;
use App\Models\User;
use App\Models\MCQ_Record;
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
        Session::get('firstMCQ');
        $record = new Record();
        $record->user_id = Session::get('user')->id;
        $record->quiz_id = Session::get('firstMCQ')->quiz_id;
        $record->status = 1;
        if ($record->save()) {

            $currentQuiz = [];

            $currentQuiz['totalMcq'] = Mcq::where("quiz_id", Session::get('firstMCQ')->quiz_id)->count();
            $currentQuiz['currentMcq'] = 1;
            $currentQuiz['quizName'] = $name;
            $currentQuiz['quizId'] = Session::get('firstMCQ')->quiz_id;
            $currentQuiz['recordId'] = $record->id;
            Session::put("currentQuiz", $currentQuiz);
            $firstMcqData = Mcq::find($id);
            return view("mcq-page", ["quizName" => $name, "mcqData" => $firstMcqData]);
        } else {
            return "something went wrong";
        }
    }
    function mcqSaveNext(Request $request, $id)
    {
        $currentQuiz = Session::get("currentQuiz");
        // $currentQuiz['currentMcq'] += 1;
        $nextMcq = Mcq::where([
            ["id", ">", $id],
            ["quiz_id", "=", $currentQuiz['quizId']]
        ])->first();

        $isExist = MCQ_Record::where([
            ["record_id", "=", $currentQuiz["recordId"]],
            ["mcq_id", "=", $request->id]
        ])->count();

        if ($isExist < 1) {
            $currentQuiz['currentMcq'] += 1;
            $mcq_record = new MCQ_Record();
            $mcq_record->record_id = $currentQuiz['recordId'];
            $mcq_record->user_id = Session::get('user')->id;
            $mcq_record->mcq_id = $request->id;
            $mcq_record->select_answer = $request->option;
            if ($request->option == MCQ::find($request->id)->correct_ans) {
                $mcq_record->is_correct = 1;
            } else {
                $mcq_record->is_correct = 0;
            }
            if (!$mcq_record->save()) {
                return "Something went wrong";
            }
        }

        Session::put("currentQuiz", $currentQuiz);
        if ($nextMcq) {

            return view("mcq-page", ["quizName" => $currentQuiz['quizName'], "mcqData" => $nextMcq]);
        } else {

            $resultData = MCQ_Record::WithMCQ()->where("record_id", $currentQuiz['recordId'])->get();
            $correctAnswers = MCQ_Record::where([
                ["record_id", "=", $currentQuiz['recordId']],
                ["is_correct", "=", 1],
            ])->count();
            $record = Record::find($currentQuiz['recordId']);
            if ($record) {
                $record->status = 2;
                $record->update();
            }

            return view('quiz-result', ["resultData" => $resultData, "correctAnswers" => $correctAnswers]);
        }
    }
    function userDetails()
    {
        $quizRecord = Record::WithQuiz()->where("user_id", Session::get("user")->id)->get();
        return view("user-details", ["quizRecord" => $quizRecord]);
    }
}
