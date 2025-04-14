<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
//        SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id;

        $vehFuel = DB::select('SELECT DISTINCT fuel_type FROM vehicules');
        $vehTrans = DB::select('SELECT DISTINCT transmission FROM vehicules');
        $vehType = DB::select('SELECT DISTINCT name FROM vehicules_types');
        return view('welcome', ['vehFuel' => $vehFuel, 'vehType' => $vehType, 'vehTrans' => $vehTrans]);
    }
}
