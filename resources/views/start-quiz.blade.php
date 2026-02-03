<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz List Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <x-user-navbar></x-user-navbar>
    <div class=" bg-gray-100 flex flex-col items-center min-h-screen  pt-5 ">
        <h1 class=" text-4xl font-bold text-green-900 text-center mb-6 font-comic">{{$quizName}}</h1>
        <h2 class=" text-lg font-bold text-green-900 text-center mb-6 font-comic">This Quiz contains {{$quizCount}} number of questions and no limit to attempt this Quiz</h2>
        <h2 class=" text-2xl font-bold text-green-900 text-center mb-6 font-comic">Good Luck</h2>
        @if(Session('user'))
        <a type="submit" href="" class=" bg-green-500 rounded-xl py-2 px-4 my-5 text-white">Start Quiz</a>
        @else
        <a type="submit" href="/user-signup-quiz" class=" bg-green-500 rounded-xl py-2 px-4 my-5 text-white">Login / SignUp</a>
        @endif
    </div>

</body>

</html>