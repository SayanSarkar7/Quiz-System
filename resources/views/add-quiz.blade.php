<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Quiz Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <x-navbar :name="$name"></x-navbar>
    <div class=" bg-gray-100 flex flex-col items-center min-h-screen  pt-5 ">
        <div class=" bg-white p-8 rounded-2xl shadow-lg w-full max-w-md ">
            @if (!Session('quizDetails'))
                <h2 class=" text-2xl text-gray-800 text-center mb-6">Add Quiz</h2>

                <form action="add-quiz" method="GET" class=" space-y-4">

                    <div>
                        <input type="text" placeholder="Enter Quiz Name"
                            class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none"
                            name="quiz">
                        @error('category')
                            <div class=" text-red-500 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <select type="text"
                        class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none"
                        name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        @error('category')
                            <div class=" text-red-500 ">{{ $message }}</div>
                        @enderror
                    </select>

                    <button type="submit" class=" w-full bg-blue-500 rounded-xl py-2 px-4 text-white">Add</button>
                </form>
            @else
                <span class=" text-green-500 font-bold"> Quiz : {{ Session('quizDetails')->name }}</span>
                <h2 class=" text-2xl text-gray-800 text-center mb-6">Add MCQs</h2>
                <form action="" method="get" class=" space-y-4">
                    <div>
                        <textarea type="text" placeholder="Enter Your Question"
                            class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none" name="quiz"></textarea>
                    </div>
                    <div>
                        <input type="text" placeholder="Enter First Option"
                            class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none"
                            name="quiz">
                    </div>
                    <div>
                        <input type="text" placeholder="Enter Second Option"
                            class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none"
                            name="quiz">
                    </div>
                    <div>
                        <input type="text" placeholder="Enter Third Option"
                            class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none"
                            name="quiz">
                    </div>
                    <div>
                        <input type="text" placeholder="Enter Fourth Option"
                            class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none"
                            name="quiz">
                    </div>
                    <div>
                        <select type="text"
                            class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none"
                            name="right answer">
                            <option>Select Right Answer</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                        </select>
                    </div>
                    <button type="submit" class=" w-full bg-blue-500 rounded-xl py-2 px-4 text-white">Add More</button>
                    <button type="submit" class=" w-full bg-green-500 rounded-xl py-2 px-4 text-white">Add and Submit</button>
                </form>
            @endif
        </div>
    </div>
</body>
