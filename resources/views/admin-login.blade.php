<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" bg-gray-100 flex justify-center items-center min-h-screen "  >
    <div class=" bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm ">
        <h2 class=" text-2xl text-gray-800 text-center mb-6">Admin Login</h2>
        <form action="" method="POST" class=" space-y-4">
            <div>
                <label for="" class=" text-gray-600 mb-1">Admin Name</label>
                <input type="text" placeholder="Enter Admin Name" class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none"   >
            </div>
            <div>
                <label for="" class=" text-gray-600 mb-1" >Admin Password</label>
                <input type="text" placeholder="Enter Admin Password" class=" w-full border px-4 border-gray-300 rounded-xl py-2 focus:outline-none" >
            </div>
            <button type="submit" class=" w-full bg-blue-500 rounded-xl py-2 px-4 text-white">Login</button>
        </form>
    </div>
</body>

</html>
