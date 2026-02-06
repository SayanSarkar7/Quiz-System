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
        <h2 class=" text-2xl text-green-900 text-center mb-6 font-comic">Category Name : {{$category}} </h2>

        <div class=" w-200 mb-10">
            <ul class="border border-gray-200 text-center">
                <li class=" p-2 font-bold text-lg">
                    <ul class=" flex justify-between">
                        <li class=" w-20">
                            Quiz Id
                        </li>
                        <li class=" w-120">
                            Name
                        </li>
                        <li class=" w-30">
                            MCQ Count
                        </li>
                        <li class=" w-30">
                            Action
                        </li>
                    </ul>
                </li>
                @foreach ($quizData as $item)
                <li class="even:bg-gray-200 p-2">
                    <ul class=" flex justify-between ">
                        <li class=" w-20">
                            {{ $item->id }}
                        </li>
                        <li class=" w-120">
                            {{ $item->name }}
                        </li>
                        <li class=" w-30">
                            {{ $item->mcq_count }}
                        </li>
                        <li class=" w-30">
                            <a href="/start-quiz/{{$item->id}}/{{$item->name}}" class=" text-green-500 font-bold">
                                Attempt Quiz
                            </a>
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        <a class=" w-20 bg-green-500 block text-center rounded-xl py-2 px-4 text-white" href="/">Back</a>
    </div>

</body>

</html>