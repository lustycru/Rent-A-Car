<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Car Rental - Details</title>

    <!-- Fonts -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css'])
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
    @foreach($vehById as $item)
        <div class="mb-[180px]">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <h3 class="work-sans text-[50px] font-[800] mb-[26px] leading-[50px]">{{ $item->vehModel }}
                        <span class="font-[300]">- {{ $item->vehBrand }}</span></h3>
                    <div class="flex items-center">
                        <p class="text-[#5937E0] font-[700] text-[30px]">${{ $item->vehPriceDay }}</p>
                        <p class="ms-2 opacity-[60%]">/ day</p>
                    </div>
                    <img src="../build/assets/img/{{ $item->vehPhotos }}"
                         alt="wallet"
                         class="mb-[20px] w-[500px]">
                    <div class="flex">
                        <img src="{{ asset('../build/assets/img/carouselFirstPhoto.png') }}"
                             alt="firstPhotoCarousel"
                             class="me-8">
                        <img src="{{ asset('../build/assets/img/carouselSecondPhoto.png') }}"
                             alt="firstPhotoCarousel"
                             class="me-8">
                        <img src="{{ asset('../build/assets/img/carouselThirdPhoto.png') }}"
                             alt="firstPhotoCarousel"
                             class="me-8">
                    </div>
                </div>

                <div class="w-[700px]">
                    <h3 class="work-sans text-[20px] font-[800] mb-[26px] leading-[50px]">Technical Specification</h3>

                    <div class="grid grid-cols-3 gap-3 mb-[48px]">
                        <div class="px-[24px] py-[29px] bg-[#FAFAFA] rounded-2xl">
                            <img src="{{ asset('../build/assets/img/gear.svg') }}"
                                 alt="gear"
                                 class="mb-4 w-8">
                            <p class="font-[700]">Gear box</p>
                            <p>{{ ucfirst($item->vehTransmission) }}</p>
                        </div>

                        <div class="px-[24px] py-[29px] bg-[#FAFAFA] rounded-2xl">
                            <img src="{{ asset('../build/assets/img/energy.svg') }}"
                                 alt="fuel"
                                 class="mb-4 w-8">
                            <p class="font-[700]">Energy type</p>
                            <p>{{ ucfirst($item->vehFuel) }}</p>
                        </div>

                        <div class="px-[24px] py-[29px] bg-[#FAFAFA] rounded-2xl">
                            <img src="{{ asset('../build/assets/img/logo.svg') }}"
                                 alt="logo"
                                 class="mb-4 w-8">
                            <p class="font-[700]">Type</p>
                            <p>{{ ucfirst($item->vtName) }}</p>
                        </div>

                        <div class="px-[24px] py-[29px] bg-[#FAFAFA] rounded-2xl">
                            <img src="{{ asset('../build/assets/img/doors.svg') }}"
                                 alt="doors"
                                 class="mb-4 w-8">
                            <p class="font-[700]">Doors</p>
                            <p>{{ ucfirst($item->vehDoors) }}</p>
                        </div>

                        <div class="px-[24px] py-[29px] bg-[#FAFAFA] rounded-2xl">
                            <img src="{{ asset('../build/assets/img/option.svg') }}"
                                 alt="conditionner"
                                 class="mb-4 w-8">
                            <p class="font-[700]">Air conditioner</p>
                            @if($item->vehAir == 1)
                                <p>Yes</p>
                            @else
                                <p>No</p>
                            @endif
                        </div>

                        <div class="px-[24px] py-[29px] bg-[#FAFAFA] rounded-2xl">
                            <img src="{{ asset('../build/assets/img/seats.svg') }}"
                                 alt="seats"
                                 class="mb-4 w-8">
                            <p class="font-[700]">Seats</p>
                            <p>{{ ucfirst($item->vehSeats) }}</p>
                        </div>
                    </div>

                    <div class="bg-[#5937E0] rounded-xl px-2 py-3 text-center w-64 mb-[48px]">
                        <a href="/reservation/{{ $item->vehId }}"
                           class="text-white cursor-pointer">Rent a car</a>
                    </div>

                    <h3 class="work-sans text-[20px] font-[800] mb-[26px] leading-[50px]">Car Equipment</h3>

                    @foreach($equipmentById as $item2)
                        <div class="flex items-center">
                            <img src="{{ asset('../build/assets/img/check.svg') }}"
                                 alt="seats"
                                 class="w-4 me-2">
                            {{ $item2->equipmentName }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

    <div class="flex items-center justify-between mb-[40px]">
        <h2 class="work-sans text-[50px] font-[800] mb-[26px] leading-[50px]">Other cars</h2>
        <a href="/vehicles">View all -></a>
    </div>

    <div class="grid grid-cols-3 gap-3 mb-[160px]">
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

    <div id="image-modal"
         class="fixed inset-0 bg-black bg-opacity-75 hidden justify-center items-center z-50">
        <img id="modal-img"
             src=""
             class="max-w-[90%] max-h-[90%] rounded-lg shadow-lg"
             alt="Zoomed Image">
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
<script src="{{ asset('../build/assets/js/details.js') }}"></script>
</body>
</html>
