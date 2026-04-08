<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
     <link rel="stylesheet" href="/build/assets/app-8f8302ad.css">
<script src="/build/assets/app-3720562b.js" defer></script>

</head>

<body >
    <!-- <div class="w-200 border-4 m-10 ml-55 bg-gray-100 border-indigo-900 p-10 text-center">
        <h1 class=" text-5xl text-green-900 flex items-center gap-9">
            <svg class=" fill-yellow-500" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#1f1f1f">
                <path d="m385-412 36-115-95-74h116l38-119 37 119h117l-95 74 35 115-94-71-95 71ZM244-40v-304q-45-47-64.5-103T160-560q0-136 92-228t228-92q136 0 228 92t92 228q0 57-19.5 113T716-344v304l-236-79-236 79Zm420.5-335.5Q740-451 740-560t-75.5-184.5Q589-820 480-820t-184.5 75.5Q220-669 220-560t75.5 184.5Q371-300 480-300t184.5-75.5ZM304-124l176-55 176 55v-171q-40 29-86 42t-90 13q-44 0-90-13t-86-42v171Zm176-86Z" />
            </svg>
            Certificate of completion
        </h1>
        <p class=" text-2xl mt-5 ">This is clarify data</p>
        <h2 class=" text-4xl text-green-800">Sayan Sarkar</h2>
        <p class=" text-3xl mt-5 ">has successfully completed the</p>
        <h3 class=" text-3xl">Footbll</h3>
        <p class=" text-2xl mt-5">{{date('y-m-d')}}</p>
    </div> -->
    <div style="width:800px; border:4px solid #1e3a8a; margin:40px auto; padding:40px; text-align:center; background:#f3f4f6;">

    <h1 style="font-size:40px; color:#064e3b;">
        <span style="color:#D4AF37; font-size:40px;">★</span>
        Certificate of Completion
    </h1>

    <p style="font-size:20px; margin-top:20px;">This is to certify that</p>

    <h2 style="font-size:32px; color:#065f46;">
         {{$data['name']}}
    </h2>

    <p style="font-size:24px; margin-top:20px;">
        has successfully completed the
    </p>

    <h3 style="font-size:24px;">
       {{$data['quiz']}}
    </h3>

    <p style="font-size:18px; margin-top:20px;">
        {{ date('Y-m-d') }}
    </p>

</div>
    <div class=" text-center flex justify-between w-200 ml-55">
        <a class=" text-green-500 font-bold text-2xl" href="/">Back</a>
        <a class=" text-green-500 font-bold text-2xl" href="/download-certificate">Download</a>
    </div>
</body>

</html>