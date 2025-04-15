<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Car Rental - Catalog</title>

    <!-- Fonts -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <!-- Styles / Scripts -->
    <link rel="stylesheet"
          href="{{ asset('../build/assets/css/app.css') }}">
</head>
<body class="my-[28px] mx-[72px]">
<header>
    <nav class="mb-[56px]">
        <ul class="flex justify-between items-center">
            <li class="font-bold">
                <a href="/"
                   class="flex items-center gap-1.5">
                    <img src="{{ asset('../build/assets/img/logo.svg') }}"
                         alt="logo">
                    Car Rental</a>
            </li>


            <li class="font-bold"><a href="/vehicles">Vehicles</a></li>

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
</header>

<main>
    <h2 class="work-sans text-[40px] font-[800] mb-[26px] text-center">Select a vehicle group</h2>

    <div class="mb-[48px]">
        <div class="flex flex-col justify-center text-center">
            <div class="mb-6">
                <a href="/vehicles" class="rounded-full bg-[#5937E0] px-6 py-1.5 text-white me-2.5">All vehicles</a>
                @foreach ($vehType as $item)
                    <a href="/vehicles/type/{{ urlencode(strtolower($item->name)) }}" class="rounded-full bg-[#FAFAFA] px-6 py-1.5 text-black me-2.5 link">{{ ucfirst($item->name) }}</a>
                @endforeach
            </div>

            <div class="mb-6">
                <a href="/vehicles" class="rounded-full bg-[#5937E0] px-6 py-1.5 text-white me-2.5">All energy type</a>
                @foreach ($vehFuel as $item)
                    <a href="/vehicles/energy/{{ urlencode(strtolower($item->fuel_type)) }}" class="rounded-full bg-[#FAFAFA] px-6 py-1.5 text-black me-2.5 link">{{ ucfirst($item->fuel_type) }}</a>
                @endforeach
            </div>

            <div class="mb-6">
                <a href="/vehicles" class="rounded-full bg-[#5937E0] px-6 py-1.5 text-white me-2.5">All types of gear</a>
            @foreach ($vehTrans as $item)
                    <a href="/vehicles/gear/{{ urlencode(strtolower($item->transmission)) }}" class="rounded-full bg-[#FAFAFA] px-6 py-1.5 text-black me-2.5 link">{{ ucfirst($item->transmission) }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-3 mb-[120px] cars">
        @foreach($allVeh as $item)
            <div class="bg-[#FAFAFA] p-[24px] rounded-2xl">
                <img src="../build/assets/img/{{ $item->vehPhotos }}"
                     alt="wallet"
                     class="mb-[20px] mx-auto">
                <div class="flex items-center justify-between">
                    <h3 class="font-[700]">{{ $item->vehModel }} <span class="font-[300]">- {{ $item->vehBrand }}</span>
                    </h3>

                    <p class="text-[#5937E0] font-[700]">${{ $item->vehPriceDay }}</p>
                </div>

                <div class="flex items-center justify-between mb-[28px]">
                    <p class="font-[300] text-sm">{{ $item->vtName }}</p>
                    <p class="font-[300] text-sm">per day</p>
                </div>

                <div class="flex justify-between mb-[28px]">
                    <p class="font-[700] flex gap-1.5"><img src="{{ asset('../build/assets/img/gear.svg') }}"
                                                            alt="gear">{{ ucfirst($item->vehTransmission) }}</p>
                    <p class="font-[700] flex gap-1.5"><img src="{{ asset('../build/assets/img/energy.svg') }}"
                                                            alt="gear">{{ ucfirst($item->vehFuel) }}</p>
                    @if($item->vehAir == 1)
                        <p class="font-[700] flex gap-1.5"><img src="{{ asset('../build/assets/img/option.svg') }}"
                                                                alt="gear">With air conditioner</p>
                    @else
                        <p class="font-[700] flex gap-1.5"><img src="{{ asset('../build/assets/img/option.svg') }}"
                                                                alt="gear">Without air conditioner</p>
                    @endif
                </div>

                <div class="bg-[#5937E0] rounded-xl px-2 py-3 text-center">
                    <a href="/vehicle/{{ $item->vehId }}"
                       class="text-white cursor-pointer">Views details</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="bg-[#FAFAFA] p-12 rounded-2xl flex justify-between items-center mb-[120px]">
        <img src="{{ asset('../build/assets/img/toyota.svg') }}"
             alt="toyota">
        <img src="{{ asset('../build/assets/img/ford.svg') }}"
             alt="ford">
        <img src="{{ asset('../build/assets/img/mercedes.svg') }}"
             alt="mercedes">
        <img src="{{ asset('../build/assets/img/jeep.svg') }}"
             alt="jeep">
        <img src="{{ asset('../build/assets/img/bmw.svg') }}"
             alt="bmw">
        <img src="{{ asset('../build/assets/img/audi.svg') }}"
             alt="audi">
    </div>
</main>

<footer>
    <div class="flex justify-between mb-[60px]">
        <a href="/"
           class="flex items-center font-bold gap-1.5 me-[60px]">
            <img src="{{ asset('../build/assets/img/logo.svg') }}"
                 alt="logo">
            Car Rental</a>

        <div class="flex gap-1.5">
            <img src="{{ asset('../build/assets/img/address.svg') }}"
                 alt="iphone">
            <div class="flex flex-col">
                <span>Address</span>
                <span class="font-bold">Oxford Ave. Cary, NC 27511</span>
            </div>
        </div>

        <div class="flex gap-1.5">
            <img src="{{ asset('../build/assets/img/email.svg') }}"
                 alt="iphone">
            <div class="flex flex-col">
                <span>Email</span>
                <span class="font-bold">nwiger@yahoo.com</span>
            </div>
        </div>

        <div class="flex gap-1.5">
            <img src="{{ asset('../build/assets/img/phone.svg') }}"
                 alt="iphone">
            <div class="flex flex-col">
                <span>Phone</span>
                <span class="font-bold">+537 547-6401</span>
            </div>
        </div>
    </div>

    <p class="font-[300] text-sm mb-10 text-center">© Copyright Car Rental 2024. Design by Figma. guru</p>
</footer>

<script src="https://cdn.tailwindcss.com"></script>
<script src="{{ asset('../build/assets/js/catalog.js') }}"></script>
</body>
</html>
