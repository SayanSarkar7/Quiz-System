<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
     <link rel="stylesheet" href="/build/assets/app-8f8302ad.css">
<script src="/build/assets/app-3720562b.js" defer></script>

</head>

<body>

    <x-navbar name={{$name}}></x-navbar>
    <div class=" bg-gray-100 flex flex-col items-center min-h-screen  pt-5 ">
        <div class=" w-200 mb-10">
            <h1 class=" text-2xl text-blue-500 mb-5">Users List</h1>
            <ul class="border border-gray-200">
                <li class=" p-2 font-bold text-lg">
                    <ul class=" flex justify-between ">
                        <li class=" w-20">
                            S.No
                        </li>
                        <li class=" w-70">
                            Name
                        </li>
                        <li class=" w-70">
                            Eamil
                        </li>

                    </ul>
                </li>
                @foreach ($users as $key=>$user)
                <li class="even:bg-gray-200 p-2">
                    <ul class=" flex justify-between  ">
                        <li class=" w-20">
                            {{ $key+1 }}
                        </li>
                        <li class=" w-70">
                            {{ $user->name }}
                        </li>
                        <li class=" w-70">
                            {{ $user->email }}
                        </li>

                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="flex justify-between">{{$users->links()}}</div>
    </div>

</body>

</html>