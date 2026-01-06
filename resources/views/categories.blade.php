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
    @if (session('category'))
        <div class=" bg-green-800 text-white pl-5" >{{ session('category') }}</div>
    @endif
    <div class=" bg-gray-100 flex justify-center pt-10 ">
        <div class=" bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm ">
            <h2 class=" text-2xl text-gray-800 text-center mb-6">Add Category</h2>

            <form action="add-category" method="POST" class=" space-y-4">
                @csrf

                <div>
                    <input type="text" placeholder="Enter Category Name"
                        class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none" name="category">
                </div>

                <button type="submit" class=" w-full bg-blue-500 rounded-xl py-2 px-4 text-white">Add</button>
            </form>
        </div>
    </div>
</body>

</html>
