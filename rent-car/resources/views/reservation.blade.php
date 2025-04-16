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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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


            <li class="ms-72"><a href="/">Home</a></li>
            <li class="font-bold"><a href="/vehicles">Vehicles</a></li>
            <li class=""><a href="">Details</a></li>
            <li class="me-72"><a href="">About Us</a></li>

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
    <h3 class="work-sans text-[50px] font-[800] mb-[100px] leading-[50px] text-center">Reservation</h3>

    @foreach($vehById as $item)
        <div class="mb-[180px]">
            <div class="flex justify-between items-center">
                <div class="flex flex-col">
                    <h3 class="work-sans text-[50px] font-[800] mb-[26px] leading-[50px]">{{ $item->vehModel }}
                        <span class="font-[300]">- {{ $item->vehBrand }}</span></h3>
                    <div class="flex items-center">
                        <p class="text-[#5937E0] font-[700] text-[30px]" id="pricePerDay">${{ $item->vehPriceDay }}</p>
                        <p class="ms-2 opacity-[60%]">/ day</p>
                    </div>
                    <img src="../build/assets/img/{{ $item->vehPhotos }}"
                         alt="wallet"
                         class="mb-[20px] w-[500px]">
                    <div class="flex">
                        <img src="{{ asset('../build/assets/img/carouselFirstPhoto.png') }}"
                             alt="firstPhotoCarousel"
                             class="me-8 imgCarousel">
                        <img src="{{ asset('../build/assets/img/carouselSecondPhoto.png') }}"
                             alt="secondPhotoCarousel"
                             class="me-8 imgCarousel">
                        <img src="{{ asset('../build/assets/img/carouselThirdPhoto.png') }}"
                             alt="thirdPhotoCarousel"
                             class="me-8 imgCarousel">
                    </div>
                </div>

                <div class="w-[600px]">
                    <form method="POST">
                        @csrf
                        <div>
                            <label for="startDate"
                                   class="sr-only">Start date</label>
                            <div class="flex flex-col mb-[20px]">
                                <input type="text"
                                       class="bg-[#FAFAFA] px-4 py-2 rounded-[12px] w-[400px]"
                                       name="startDate"
                                       id="startDate"
                                       placeholder="Select a start date">
                                @error('startDate')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="returnDate"
                                   class="sr-only">Return date</label>
                            <div class="flex flex-col mb-[20px]">
                                <input type="text"
                                       class="bg-[#FAFAFA] px-4 py-2 rounded-[12px] w-[400px]"
                                       name="returnDate"
                                       id="returnDate"
                                       placeholder="Select a return date">
                                @error('endDate')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror

                                @error('returnDate')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="priceDay" id="priceDay" value="{{ $item->vehPriceDay }}">

                        <div>
                            <label for="email"
                                   class="sr-only">Email</label>
                            <div class="flex flex-col mb-[20px]">
                                <input type="email"
                                       class="bg-[#FAFAFA] px-4 py-2 rounded-[12px] w-[400px]"
                                       name="email"
                                       placeholder="Enter your email">
                                @error('email')
                                <p class="text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex">
                            <img src="{{ asset('../build/assets/img/check.svg') }}"
                                 alt="check" class="me-2">
                        <p id="totalPrice">Total price</p>
                        </div>

                        <input type="submit"
                               class="bg-[#5937E0] rounded-xl px-2 py-3 text-center w-[400px] cursor-pointer text-white mt-6"
                               value="Book now">
                        @if(session('success'))
                            <div class="bg-green-100 text-green-800 p-4 rounded-xl mb-4 mt-4 w-[400px]">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="bg-[#5937E0] w-100 rounded-2xl py-[60px] px-[74px] mb-[100px]">
        <div class="flex justify-between text-white items-center">
            <div class="w-[550px] me-24">
                <h2 class="work-sans text-[50px] font-[800] mb-[10px] leading-[50px]">Looking for a car?</h2>
                <h2 class="work-sans text-[30px] mb-[18px] leading-[50px]">+537 547-6401</h2>
                <p class="work-sans text-[14px] mb-[26px]">Amet cras hac orci lacus. Faucibus ipsum arcu lectus nibh
                    sapien bibendum ullamcorper in...</p>
                <a href="/vehicles"
                   class="bg-[#FF9E0C] px-6 py-2.5 rounded-[12px]">Book now</a>
            </div>

            <div>
                <img src="{{ asset('../build/assets/img/big_car.jpg') }}"
                     alt="car"
                     class="w-[450px]">
            </div>
        </div>
    </div>

    <div class="fixed inset-0 bg-black bg-opacity-75 hidden justify-center items-center z-50 modalDiv">
        <img src=""
             class="w-[400px] rounded-lg modalImg"
             alt="zoomed image">
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ asset('../build/assets/js/reservation.js') }}"></script>
<script src="{{ asset('../build/assets/js/vehicle.js') }}"></script>

<script>
    const unavailableRanges = @json(
        collect($availabilities)->map(fn($item) => [
            'from' => $item->start_date,
            'to' => $item->end_date
        ])
    );

    flatpickr("#startDate", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: unavailableRanges,
    });

    flatpickr("#returnDate", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: unavailableRanges,
    });
</script>
</body>
</html>
