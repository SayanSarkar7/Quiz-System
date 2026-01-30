<!DOCTYPE html>
<html lang="en">

<head>
    <title>User SignUp</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <x-user-navbar></x-user-navbar>
    <div class=" bg-gray-100 flex justify-center items-center min-h-screen ">
        <div class=" bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm ">
            <h2 class=" text-2xl text-gray-800 text-center mb-6">User SignUp</h2>
            @error('user')
            <div class=" text-red-500 ">{{ $message }}</div>
            @enderror
            <form action="user-signup" method="POST" class=" space-y-4">
                @csrf

                <div>
                    <label for="" class=" text-gray-600 mb-1">User Name</label>
                    <input type="text" placeholder="Enter User Name"
                        class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none" name="name">
                    @error('name')
                    <div class=" text-red-500 ">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="" class=" text-gray-600 mb-1">User Email</label>
                    <input type="text" placeholder="Enter User Email"
                        class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none" name="email">
                    @error('email')
                    <div class=" text-red-500 ">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="" class=" text-gray-600 mb-1">User Password</label>
                    <input type="password" placeholder="Enter User Password"
                        class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none" name="password">
                    @error('password')
                    <div class=" text-red-500 ">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="" class=" text-gray-600 mb-1">Confirm User Password</label>
                    <input type="password" placeholder="Confirm User Password"
                        class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none" name="password_confirmation">
                    @error('password_confirmation')
                    <div class=" text-red-500 ">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class=" w-full bg-green-500 rounded-xl py-2 px-4 text-white">SignUp</button>
            </form>
        </div>
    </div>
</body>

</html>