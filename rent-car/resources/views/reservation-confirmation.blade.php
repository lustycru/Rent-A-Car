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
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet"
          href="{{ asset('../build/assets/css/app.css') }}">
</head>
<body style="background-color: #ffffff; font-family: 'Inter', sans-serif; color: #111827; padding: 32px;">
<div style="max-width: 600px; margin: 0 auto; border: 1px solid #e5e7eb; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);">

    <h1 style="font-family: 'Work Sans', sans-serif; color: #5937E0; font-size: 24px; font-weight: bold; margin-bottom: 16px;">
        Confirmation de réservation
    </h1>

    <p style="margin-bottom: 24px;">Merci pour votre réservation ! Voici les détails :</p>

    <ul style="margin-bottom: 24px; padding-left: 16px;">
        <li style="margin-bottom: 8px;">
            <strong>Véhicule :</strong> {{ $vehicleById[0]->vehBrand }} {{ $vehicleById[0]->vehModel }}
        </li>
        <li style="margin-bottom: 8px;">
            <strong>Date de début :</strong> {{ $reservation['start_date'] }}
        </li>
        <li style="margin-bottom: 8px;">
            <strong>Date de fin :</strong> {{ $reservation['end_date'] }}
        </li>
        <li style="margin-bottom: 8px;">
            <strong>Prix total :</strong> {{ $reservation['total_price'] }} €
        </li>
    </ul>

    <p>Nous restons à votre disposition pour toute question.</p>

    <div style="margin-top: 32px; text-align: center; font-size: 12px; color: #6b7280;">
        © {{ date('Y') }} Rental Car. Tous droits réservés.
    </div>
</div>
</body>
</html>

