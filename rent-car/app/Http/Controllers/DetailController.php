<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($id) {

        $vehicleById = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id WHERE v.id = $id;");

        $equipmentById = DB::select("SELECT
    ve.vehicule_id AS vehId,
    e.name AS equipmentName
FROM vehicules_equipments ve
INNER JOIN equipments e ON ve.equipment_id = e.id WHERE ve.vehicule_id = $id;");

        $allVeh = DB::select("SELECT v.id AS vehId, v.brand AS vehBrand, v.model AS vehModel, v.year AS vehYear, v.price_per_day AS vehPriceDay, v.doors AS vehDoors, v.fuel_type AS vehFuel, v.air_conditioning AS vehAir, v.seats AS vehSeats, v.transmission AS vehTransmission, v.vehicule_type_id AS vehTypeId, vt.id AS vtId, vt.name AS vtName, vp.image_url AS vehPhotos FROM vehicules v INNER JOIN vehicules_types vt ON v.vehicule_type_id = vt.id INNER JOIN vehicules_photos vp ON v.id = vp.vehicule_id  WHERE v.id != $id LIMIT 6");

        return view('details', ['vehById' => $vehicleById, 'allVeh' => $allVeh, 'equipmentById' => $equipmentById]);
    }
}
