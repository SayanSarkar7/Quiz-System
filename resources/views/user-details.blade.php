<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Details Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-user-navbar></x-user-navbar>
    <div class=" flex items-center min-h-screen flex-col bg-gray-100">
        <h1 class=" text-3xl text-green-900 p-5">
            Attempted Quiz
        </h1>

        <div class=" w-200">

            <ul class="border border-gray-200">
                <li class=" p-2 font-bold text-lg">
                    <ul class=" flex justify-between ">
                        <li class=" w-30">
                            S.No
                        </li>
                        <li class=" w-100">
                            Name
                        </li>
                        <li class=" w-70">
                            Status
                        </li>

                    </ul>
                </li>
                @foreach ($quizRecord as $key=> $record)
                <li class="even:bg-gray-200 p-2">
                    <ul class=" flex justify-between  ">
                        <li class=" w-30">
                            {{ $key+1 }}
                        </li>
                        <li class=" w-100">
                            {{ $record->name }}
                        </li>
                        <li class=" w-70">
                            @if($record->status==2)
                            <span class=" text-green-500">Completed</span>
                            
                            @else
                            <span class=" text-orange-500">Not Completed</span>
                            @endif
                        </li>

                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>