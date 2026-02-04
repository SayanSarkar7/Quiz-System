<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MCQ Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <x-user-navbar></x-user-navbar>
    <div class=" bg-gray-100 flex flex-col items-center min-h-screen  pt-5 ">
        <h1 class=" text-4xl font-bold text-green-900 text-center mb-6 font-comic">Java DSA All Topics</h1>
        <h2 class=" text-2xl font-bold text-green-900 text-center mb-6 font-comic">
            Question No. 3
        </h2>
        <div class=" bg-white mt-2 p-4 rounded-xl shadow-2xl w-140">
            <h3 class=" text-green-900 font-bold text-xl mb-1">Q1. What is Java?</h3>
            <form action=" " class=" space-y-4" method="get">
                <label for="option_1" class=" flex border ring-1 ring-green-700 cursor-pointer border-green-700 p-3 mt-2 rounded-xl shadow-md hover:bg-green-50">
                    <input id="option_1" class=" form-radio text-green-900 accent-green-700" type="radio">
                    <span class=" text-green-900 pl-2 ">Programming Language</span>
                </label>
                <label for="option_2" class=" flex border ring-1 ring-green-700 cursor-pointer border-green-700 p-3 mt-2 rounded-xl shadow-md hover:bg-green-50">
                    <input id="option_2" class=" form-radio text-green-900 accent-green-700" type="radio">
                    <span class=" text-green-900 pl-2 ">Programming Language</span>
                </label>
                <label for="option_3" class=" flex border ring-1 ring-green-700 cursor-pointer border-green-700 p-3 mt-2 rounded-xl shadow-md hover:bg-green-50">
                    <input id="option_3" class=" form-radio text-green-900 accent-green-700" type="radio">
                    <span class=" text-green-900 pl-2 ">Programming Language</span>
                </label>
                <label for="option_4" class=" flex border ring-1 ring-green-700 cursor-pointer border-green-700 p-3 mt-2 rounded-xl shadow-md hover:bg-green-50">
                    <input id="option_4" class=" form-radio text-green-900 accent-green-700" type="radio">
                    <span class=" text-green-900 pl-2 ">Programming Language</span>
                </label>
                <button type="submit" class=" cursor-pointer w-full bg-green-500 rounded-xl py-2 px-4 text-white">Save and Next</button>

            </form>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>

</html>