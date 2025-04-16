<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmation;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Models\Vehicules_availabilities;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index($id) {

        $vehicleById = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE v.id = $id;");

        $equipmentById = DB::select("SELECT
    ve.vehicule_id AS vehId,
    e.name AS equipmentName
FROM vehicules_equipments ve
INNER JOIN equipments e ON ve.equipment_id = e.id WHERE ve.vehicule_id = $id;");

        $allVeh = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id  WHERE v.id != $id LIMIT 6");

        $availabilities = DB::select("SELECT * FROM vehicules_availabilities WHERE vehicule_id = $id");

        return view('reservation', ['vehById' => $vehicleById, 'allVeh' => $allVeh, 'equipmentById' => $equipmentById, 'availabilities' => $availabilities]);
    }

    public function send(Request $request, $id) {
        $data = $request->validate(['startDate' => ['required', 'date', 'date_format:Y-m-d'], 'returnDate' => ['required', 'date', 'date_format:Y-m-d', 'after:startDate'], 'email' => ['required', 'email'], 'priceDay' => ['required']]);

        $startTime = new DateTime($data['startDate']);
        $returnDate = new DateTime($data['returnDate']);
        $interval = $startTime->diff($returnDate);

        $intPrice = (int)$data['priceDay'];
        $totalPrice = $interval->d * $intPrice;

        $reservationData = [
            "start_date" => $data['startDate'],
            "end_date" => $data['returnDate'],
            "email" => $data['email'],
            "vehicule_id" => $id,
            "status" => "pending",
            "total_price" => $totalPrice,
        ];

        $vehicleById = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE v.id = $id;");

        Reservation::query()->insert($reservationData);

        Vehicules_availabilities::query()->insert([
            "start_date" => $data['startDate'],
            "end_date" => $data['returnDate'],
            "vehicule_id" => $id,
            "is_available" => 1,
        ]);

        Mail::to($data['email'])->send(new ReservationConfirmation($reservationData, $vehicleById));

        return redirect()->route('reservation.show', ['id' => $id])
            ->with('success', 'The email has been send!');
    }
}
