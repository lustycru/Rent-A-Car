<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request) {

        $vehFuel = DB::select('SELECT DISTINCT fuel_type FROM vehicules');
        $vehTrans = DB::select('SELECT DISTINCT transmission FROM vehicules');
        $vehType = DB::select('SELECT DISTINCT name FROM vehicules_types');
        $allVehiclesWithInnerJoinLimit6 = DB::select('SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id LIMIT 6;');

        return view('welcome', ['vehFuel' => $vehFuel, 'vehType' => $vehType, 'vehTrans' => $vehTrans, 'allVeh' => $allVehiclesWithInnerJoinLimit6]);
    }

    public function send(Request $request) {
        $data = $request->validate(['veh-type' => 'nullable', 'energy-type'  => 'nullable', 'gear-type'  => 'nullable']);

        $vehFuel = DB::select('SELECT DISTINCT fuel_type FROM vehicules');
        $vehTrans = DB::select('SELECT DISTINCT transmission FROM vehicules');
        $vehType = DB::select('SELECT DISTINCT name FROM vehicules_types');

        if ($request) {
            if ($data['veh-type']) {
                $allVehiclesWithInnerJoin = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE vt.name = '" . strtolower($data['veh-type']) . "';");
            }

            if ($data['veh-type'] && $data['energy-type']) {
                $allVehiclesWithInnerJoin = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE vt.name = '" . strtolower($data['veh-type']) . "' AND v.fuel_type = '" . strtolower($data['energy-type']) . "';");
            }

            if ($data['veh-type'] && $data['gear-type']) {
                $allVehiclesWithInnerJoin = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE vt.name = '" . strtolower($data['veh-type']) . "' AND v.transmission = '" . strtolower($data['gear-type']) . "';");
            }

            if ($data['energy-type'] && $data['gear-type']) {
                $allVehiclesWithInnerJoin = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE v.fuel_type = '" . strtolower($data['energy-type']) . "' AND v.transmission = '" . strtolower($data['gear-type']) . "';");
            }

            if ($data['veh-type'] && $data['energy-type'] && $data['gear-type']) {
                $allVehiclesWithInnerJoin = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE v.fuel_type = '" . strtolower($data['energy-type']) . "' AND v.transmission = '" . strtolower($data['gear-type']) . "' AND vt.name = '" . strtolower($data['veh-type']) . "';");
            }
        }

        return view('catalog', ['vehFuel' => $vehFuel, 'vehType' => $vehType, 'vehTrans' => $vehTrans, 'allVeh' => $allVehiclesWithInnerJoin]);
    }
}
