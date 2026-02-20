<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz Result Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-user-navbar></x-user-navbar>
    <div class=" flex items-center min-h-screen flex-col bg-gray-100">
        <h1 class=" text-3xl text-green-900 p-5">
            Quiz Result
        </h1>

        <div class=" w-200">
            <h1 class=" text-2xl text-green-900 py-5 text-center">{{$correctAnswers}} out of {{count($resultData)}} correct</h1>
            <ul class="border border-gray-200">
                <li class=" p-2 font-bold text-lg">
                    <ul class=" flex justify-between ">
                        <li class=" w-20">
                            S.No
                        </li>
                        <li class=" w-70">
                            Question
                        </li>

                        <li class=" w-70">
                            Result
                        </li>
                    </ul>
                </li>
                @foreach ($resultData as $key=> $item)
                <li class="even:bg-gray-200 p-2">
                    <ul class=" flex justify-between  ">
                        <li class=" w-20">
                            {{ $key+1 }}
                        </li>
                        <li class=" w-70">
                            {{ $item->question }}
                        </li>

                        @if($item->is_correct)
                        <li class=" w-70 text-green-500">
                            Correct
                        </li>
                        @else
                        <li class=" w-70 text-red-500">
                            Incorrect
                        </li>

                        @endif
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>