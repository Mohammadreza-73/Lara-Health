<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('/vendor/health/plugins/tailwind/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/health/css/styles.css') }}">

    <style>

    </style>
    <title> Laravel Health </title>
</head>

<body class="flex items-center justify-center">
    <div class="flex justify-center">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            @if(config("health.database"))
            <div class="relative bg-white p-6 rounded-3xl w-64 mt-10 shadow-xl">
                <div
                    class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-pink-500 right-4 -top-6">
                    <svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" fill="white"
                        class="h-8 w-8" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: none;
                                stroke: #000000;
                                stroke-width: 2;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                                stroke-miterlimit: 10;
                            }
                        </style>
                        <ellipse class="st0" cx="14" cy="8" rx="10" ry="5" />
                        <g>
                            <ellipse cx="14" cy="8" rx="11" ry="6" />
                            <path
                                d="M14,24c-4.8,0-8.8-1.4-11-3.6V24c0,3.4,4.8,6,11,6c0.9,0,1.8-0.1,2.7-0.2C15.2,28.3,14.3,26.2,14,24C14,24,14,24,14,24z" />
                            <path
                                d="M3,12.4V16c0,3.4,4.8,6,11,6c0,0,0,0,0.1,0c0.2-2.4,1.4-4.6,3-6.2c-1,0.1-2,0.2-3.1,0.2C9.2,16,5.2,14.6,3,12.4z" />
                        </g>
                        <path d="M31.7,20.9c-0.1-0.5-0.7-0.8-1.2-0.7c-0.7,0.2-1.2,0-1.3-0.2c-0.1-0.2,0-0.7,0.5-1.3c0.4-0.4,0.4-1,0-1.4
                        c-1-1-2.2-1.7-3.6-2.1c-0.5-0.1-1.1,0.2-1.2,0.7c-0.2,0.7-0.6,1-0.9,1s-0.6-0.4-0.9-1c-0.2-0.5-0.7-0.8-1.2-0.7
                        c-1.4,0.4-2.6,1.1-3.6,2.1c-0.4,0.4-0.4,1,0,1.4c0.5,0.5,0.6,1,0.5,1.3c-0.1,0.2-0.6,0.4-1.3,0.2c-0.5-0.1-1.1,0.2-1.2,0.7
                        C16.1,21.6,16,22.3,16,23s0.1,1.4,0.3,2.1c0.1,0.5,0.7,0.8,1.2,0.7c0.7-0.2,1.2,0,1.3,0.2c0.1,0.2,0,0.7-0.5,1.3
                        c-0.4,0.4-0.4,1,0,1.4c1,1,2.2,1.7,3.6,2.1c0.5,0.1,1.1-0.2,1.2-0.7c0.2-0.7,0.6-1,0.9-1s0.6,0.4,0.9,1c0.1,0.4,0.5,0.7,1,0.7
                        c0.1,0,0.2,0,0.3,0c1.4-0.4,2.6-1.1,3.6-2.1c0.4-0.4,0.4-1,0-1.4c-0.5-0.5-0.6-1-0.5-1.3c0.1-0.2,0.6-0.4,1.3-0.2
                        c0.5,0.1,1.1-0.2,1.2-0.7c0.2-0.7,0.3-1.4,0.3-2.1S31.9,21.6,31.7,20.9z M24,26c-1.7,0-3-1.3-3-3s1.3-3,3-3s3,1.3,3,3S25.7,26,24,26
                        z" />
                    </svg>
                </div>
                <div class="mt-5">
                    <div class="text-center">
                        <p class="text-xl font-semibold my-2"> دیتابیس </p>
                        <div class="flex space-x-2 text-sm">
                            @if ($data["database"]["status"])
                            <span class="mx-auto bg-green-600 text-white py-2 px-3 rounded">
                                صحیح
                            </span>
                            @else
                            <span class="mx-auto bg-red-600 text-white py-2 px-3 rounded">
                                خطا
                            </span>
                            @endif
                        </div>
                    </div>
                    @if (! $data["database"]["status"])
                    <div class="border-t-2 mt-3"></div>
                    <div class="mt-3 text-center">
                        <p class="text-base text-red-600">
                            {{ $data["database"]["data"] }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            @if (config("health.migrations"))
            <div class="relative bg-white p-6 rounded-3xl w-64 mt-10 shadow-xl">
                <div
                    class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 right-4 -top-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div class="mt-5">
                    <div class="text-center">
                        <p class="text-xl font-semibold my-2"> مایگریشن ها </p>
                        <div class="flex space-x-2 text-sm">
                            @if ($data["migrations"]["status"])
                            <span class="mx-auto bg-green-600 text-white py-2 px-3 rounded">
                                صحیح
                            </span>
                            @else
                            <span class="mx-auto bg-red-600 text-white py-2 px-3 rounded">
                                خطا
                            </span>
                            @endif
                        </div>
                    </div>
                    @if (! $data["migrations"]["status"])
                    <div class="border-t-2 mt-3"></div>
                    <div class="mt-3 text-center">
                        <p class="text-base text-red-600">
                            {{ $data["migrations"]["data"] }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            @if (config("health.routes"))
            <div class="relative bg-white p-6 rounded-3xl w-64 mt-10 shadow-xl">
                <div
                    class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-green-500 right-4 -top-6">
                    <svg class="h-8 w-8" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 101 101">
                        <path
                            d="M52.5,82h-24c-7.13,0-12.93-6.06-12.93-13.5S21.34,55,28.47,55h41.1c8.78,0,15.93-7.4,15.93-16.5S78.35,22,69.56,22H38.5a1.5,1.5,0,0,0,0,3H69.56c7.13,0,12.93,6.06,12.93,13.5S76.69,52,69.56,52H28.47c-8.78,0-15.93,7.4-15.93,16.5S19.68,85,28.47,85h24a1.5,1.5,0,0,0,0-3Z" />
                        <path
                            d="M20.5,32A8.5,8.5,0,1,0,12,23.5,8.51,8.51,0,0,0,20.5,32Zm0-14A5.5,5.5,0,1,1,15,23.5,5.51,5.51,0,0,1,20.5,18Z" />
                        <path
                            d="M80.59,72.48a1.5,1.5,0,0,0-2.12,0l-5.79,5.79-5.79-5.79a1.5,1.5,0,0,0-2.12,2.12l5.79,5.79-5.79,5.79a1.5,1.5,0,1,0,2.12,2.12l5.79-5.79,5.79,5.79a1.5,1.5,0,0,0,2.12-2.12L74.8,80.39l5.79-5.79A1.5,1.5,0,0,0,80.59,72.48Z" />
                        </svg>
                </div>
                <div class="mt-5">
                    <div class="text-center">
                        <p class="text-xl font-semibold my-2"> روت‌ها </p>
                        <div class="flex space-x-2 text-sm">
                            @if ($data["routes"]["status"])
                            <span class="mx-auto bg-green-600 text-white py-2 px-3 rounded">
                                صحیح
                            </span>
                            @else
                            <span class="mx-auto bg-red-600 text-white py-2 px-3 rounded">
                                خطا
                            </span>
                            @endif
                        </div>
                    </div>
                    @if (! $data["routes"]["status"])
                    <div class="border-t-2 mt-3"></div>
                    <div class="mt-3 text-center">
                        <p class="text-base text-red-600">
                            {{ $data["routes"]["data"] }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</body>

</html>