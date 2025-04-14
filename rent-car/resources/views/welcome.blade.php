<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Rental Car - Home</title>

    <!-- Fonts -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="my-[28px] mx-[72px]">
<header>
    <nav class="mb-[28px]">
        <ul class="flex justify-between items-center">
            <li class="font-bold">
                <a href="/"
                   class="flex items-center gap-1.5">
                    <img src="{{ asset('../build/assets/img/logo.svg') }}"
                         alt="logo">
                    Car Rental</a>
            </li>


            <li class="font-bold"><a href="/vehicules">Vehicles</a></li>

            <li class="flex gap-1.5">
                <img src="{{ asset('../build/assets/img/iphone.svg') }}"
                     alt="iphone">
                <div class="flex flex-col">
                    <span class="font-bold">Need help?</span>
                    <span>+996 247-1680</span>
                </div>
            </li>
        </ul>
    </nav>

    <div class="bg-[#5937E0] w-100 h-[24%] rounded-xl py-[134px] px-[74px] mb-[60px]">
        <div class="flex justify-between text-white items-center">
            <div class="w-[550px] me-24">
                <h2 class="work-sans text-[50px] font-[800] mb-[26px] leading-[50px]">Experience the road like never
                    before</h2>
                <p class="work-sans text-[14px] mb-[26px]">Rent a car in just a few taps. Fast, flexible, and
                    affordable, your next ride is
                    always ready, wherever and whenever you need it.</p>
                <a href="/vehicles"
                   class="bg-[#FF9E0C] px-4 py-2 rounded-[12px]">View all cars</a>
            </div>

            <div class="bg-white h-full w-[400px] rounded-xl p-[30px] text-black">
                <h3 class="work-sans text-center text-[24px] font-[700] mb-[30px]">Book your car</h3>
                <form method="POST"
                      class="flex flex-col">
                    <select name="veh-type"
                            id="veh-type"
                            class="bg-[#FAFAFA] px-4 py-2 rounded-[12px] mb-[20px]">
                        <option value="">Vehicle type</option>
                        @foreach ($vehType as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                    <select name="energy-type"
                            id="energy-type"
                            class="bg-[#FAFAFA] px-4 py-2 rounded-[12px] mb-[20px]">
                        <option value="">Energy type</option>
                        @foreach ($vehFuel as $item)
                            <option value="{{ $item->fuel_type }}">{{ $item->fuel_type }}</option>
                        @endforeach
                    </select>

                    <select name="gear-type"
                            id="gear-type"
                            class="bg-[#FAFAFA] px-4 py-2 rounded-[12px] mb-[40px]">
                        <option value="">Type of gear</option>
                        @foreach ($vehTrans as $item)
                            <option value="{{ $item->transmission }}">{{ $item->transmission }}</option>
                        @endforeach
                    </select>

                    <input type="submit"
                           value="Book now"
                           class="bg-[#FF9E0C] px-4 py-2 rounded-[12px] text-white cursor-pointer">
                </form>
            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <div class="flex flex-col items-center text-center w-1/3 px-4">
            <img src="{{ asset('../build/assets/img/location.svg') }}"
                 alt="location" class="mb-[20px]">
            <h3 class="work-sans font-[600] text-[20px] mb-[10px]">Availability</h3>
            <p class="w-4/5">A wide range of vehicles, available anytime, wherever you need them.</p>
        </div>

        <div class="flex flex-col items-center text-center w-1/3 px-4">
            <img src="{{ asset('../build/assets/img/car.svg') }}"
                 alt="car" class="mb-[20px]">
            <h3 class="work-sans font-[600] text-[20px] mb-[10px]">Comfort</h3>
            <p class="w-4/5">Enjoy a smooth, relaxing drive with clean, modern, well-equipped cars.</p>
        </div>

        <div class="flex flex-col items-center text-center w-1/3 px-4">
            <img src="{{ asset('../build/assets/img/wallet.svg') }}"
                 alt="wallet" class="mb-[20px]">
            <h3 class="work-sans font-[600] text-[20px] mb-[10px]">Savings</h3>
            <p class="w-4/5">Smart prices, no hidden fees — only pay when you actually drive.</p>
        </div>
    </div>
</header>

<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
