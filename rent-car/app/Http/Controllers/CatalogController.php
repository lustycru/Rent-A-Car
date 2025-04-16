<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index(Request $request) {

        $vehFuel = DB::select('SELECT DISTINCT fuel_type FROM vehicules');
        $vehTrans = DB::select('SELECT DISTINCT transmission FROM vehicules');
        $vehType = DB::select('SELECT DISTINCT name FROM vehicules_types');
        $allVehiclesWithInnerJoin = DB::select('SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id;');

        return view('catalog', ['vehFuel' => $vehFuel, 'vehType' => $vehType, 'vehTrans' => $vehTrans, 'allVeh' => $allVehiclesWithInnerJoin]);
    }

    public function filter($param, $value) {
        if ($param === 'type') {
            $vehicles = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE vt.name = '$value';");
        } else if ($param === 'energy') {
            $vehicles = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE v.fuel_type = '$value';");
        } else if ($param === 'gear') {
            $vehicles = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE v.transmission = '$value';");
        }

        $vehFuel = DB::select("SELECT DISTINCT fuel_type FROM vehicules");
        $vehTrans = DB::select('SELECT DISTINCT transmission FROM vehicules');
        $vehType = DB::select('SELECT DISTINCT name FROM vehicules_types');

        if (request()->ajax()) {
            return response()->json($vehicles);
        }

        return view('catalog', ['vehFuel' => $vehFuel, 'vehType' => $vehType, 'vehTrans' => $vehTrans, 'allVeh' => $vehicles]);

    }
}
