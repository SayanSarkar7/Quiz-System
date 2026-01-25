<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Categories Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <x-navbar :name="$name"></x-navbar>
    <div class=" bg-gray-100 flex flex-col items-center min-h-screen  pt-5 ">
        <h2 class=" text-2xl text-gray-800 text-center mb-6">Quiz Name: {{$quizName}}</h2>



        <div class=" w-200 mb-10">
            <ul class="border border-gray-200">
                <li class=" p-2 font-bold text-lg">
                    <ul class=" flex justify-between ">
                        <li class=" w-20">
                            MCQ Id
                        </li>
                        <li class=" w-170">
                            Question
                        </li>
                    </ul>
                </li>
                @foreach ($mcqs as $mcq)
                <li class="even:bg-gray-200 p-2">
                    <ul class=" flex justify-between  ">
                        <li class=" w-20">
                            {{ $mcq->id }}
                        </li>
                        <li class=" w-170">
                            {{ $mcq->question }}
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        <a class=" w-20 bg-blue-500 block text-center rounded-xl py-2 px-4 text-white" href="/add-quiz">Back</a>
    </div>

</body>

</html>