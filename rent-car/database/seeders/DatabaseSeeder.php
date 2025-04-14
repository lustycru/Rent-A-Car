<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('vehicules_types')->insert([
            ['name' => 'sedan'],
            ['name' => 'minivan'],
            ['name' => 'suv'],
            ['name' => 'crossover'],
            ['name' => 'pickup'],
            ['name' => 'cabriolet'],
        ]);

        DB::table('equipments')->insert([
            ['name' => 'GPS'],
            ['name' => 'Bluetooth'],
            ['name' => 'Sièges chauffants'],
            ['name' => 'Caméra de recul'],
            ['name' => 'Toit ouvrant'],
        ]);

        DB::table('vehicules')->insert([
            ['brand' => 'Mercedes', 'model' => 'Sedan', 'year' => 2023, 'price_per_day' => 25.00, 'doors' => 4, 'fuel_type' => 'essence', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'automatique', 'vehicule_type_id' => 1],
            ['brand' => 'Mercedes', 'model' => 'Sport', 'year' => 2023, 'price_per_day' => 50.00, 'doors' => 2, 'fuel_type' => 'diesel', 'air_conditioning' => true, 'seats' => 4, 'transmission' => 'manuelle', 'vehicule_type_id' => 6],
            ['brand' => 'Mercedes', 'model' => 'Sedan', 'year' => 2023, 'price_per_day' => 45.00, 'doors' => 4, 'fuel_type' => 'électrique', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'automatique', 'vehicule_type_id' => 1],
            ['brand' => 'Porsche', 'model' => 'SUV', 'year' => 2023, 'price_per_day' => 40.00, 'doors' => 4, 'fuel_type' => 'hybride', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'automatique', 'vehicule_type_id' => 3],
            ['brand' => 'Toyota', 'model' => 'Sedan', 'year' => 2023, 'price_per_day' => 35.00, 'doors' => 4, 'fuel_type' => 'essence', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'manuelle', 'vehicule_type_id' => 1],
            ['brand' => 'Porsche', 'model' => 'SUV', 'year' => 2023, 'price_per_day' => 50.00, 'doors' => 4, 'fuel_type' => 'diesel', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'automatique', 'vehicule_type_id' => 3],
            ['brand' => 'Mercedes', 'model' => 'Van', 'year' => 2023, 'price_per_day' => 50.00, 'doors' => 5, 'fuel_type' => 'hybride', 'air_conditioning' => true, 'seats' => 7, 'transmission' => 'automatique', 'vehicule_type_id' => 2],
            ['brand' => 'Toyota', 'model' => 'Sport', 'year' => 2023, 'price_per_day' => 60.00, 'doors' => 2, 'fuel_type' => 'électrique', 'air_conditioning' => true, 'seats' => 4, 'transmission' => 'manuelle', 'vehicule_type_id' => 6],
            ['brand' => 'Maybach', 'model' => 'Sedan', 'year' => 2023, 'price_per_day' => 70.00, 'doors' => 4, 'fuel_type' => 'hybride', 'air_conditioning' => true, 'seats' => 5, 'transmission' => 'automatique', 'vehicule_type_id' => 1],
        ]);

        DB::table('vehicules_photos')->insert([
            ['vehicule_id' => 1, 'photo_path' => 'vehicule1.jpg', 'display_order' => '3'],
            ['vehicule_id' => 2, 'photo_path' => 'vehicule2.jpg', 'display_order' => '3'],
            ['vehicule_id' => 3, 'photo_path' => 'vehicule3.jpg', 'display_order' => '3'],
            ['vehicule_id' => 4, 'photo_path' => 'vehicule4.jpg', 'display_order' => '3'],
            ['vehicule_id' => 5, 'photo_path' => 'vehicule5.jpg', 'display_order' => '3'],
            ['vehicule_id' => 6, 'photo_path' => 'vehicule6.jpg', 'display_order' => '3'],
            ['vehicule_id' => 7, 'photo_path' => 'vehicule7.jpg', 'display_order' => '3'],
            ['vehicule_id' => 8, 'photo_path' => 'vehicule8.jpg', 'display_order' => '3'],
            ['vehicule_id' => 9, 'photo_path' => 'vehicule9.jpg', 'display_order' => '3'],
        ]);

        DB::table('vehicules_equipments')->insert([
            ['vehicule_id' => 1, 'equipment_id' => 1],
            ['vehicule_id' => 1, 'equipment_id' => 2],
            ['vehicule_id' => 2, 'equipment_id' => 1],
            ['vehicule_id' => 2, 'equipment_id' => 4],
            ['vehicule_id' => 3, 'equipment_id' => 2],
            ['vehicule_id' => 3, 'equipment_id' => 3],
            ['vehicule_id' => 4, 'equipment_id' => 1],
            ['vehicule_id' => 4, 'equipment_id' => 5],
            ['vehicule_id' => 5, 'equipment_id' => 3],
            ['vehicule_id' => 5, 'equipment_id' => 4],
            ['vehicule_id' => 6, 'equipment_id' => 1],
            ['vehicule_id' => 6, 'equipment_id' => 5],
            ['vehicule_id' => 7, 'equipment_id' => 2],
            ['vehicule_id' => 7, 'equipment_id' => 3],
            ['vehicule_id' => 8, 'equipment_id' => 1],
            ['vehicule_id' => 8, 'equipment_id' => 4],
            ['vehicule_id' => 8, 'equipment_id' => 5],
            ['vehicule_id' => 9, 'equipment_id' => 1],
            ['vehicule_id' => 9, 'equipment_id' => 2],
            ['vehicule_id' => 9, 'equipment_id' => 3],
        ]);

        DB::table('reservations')->insert([
            ['email' => 'alice@example.com', 'vehicule_id' => 1, 'start_date' => '2025-04-20', 'end_date' => '2025-04-23', 'total_price' => 120.00],
            ['email' => 'bob@example.com', 'vehicule_id' => 1, 'start_date' => '2025-05-10', 'end_date' => '2025-05-13', 'total_price' => 120.00],
            ['email' => 'charlie@example.com', 'vehicule_id' => 2, 'start_date' => '2025-04-25', 'end_date' => '2025-04-30', 'total_price' => 325.00],
            ['email' => 'diane@example.com', 'vehicule_id' => 2, 'start_date' => '2025-06-01', 'end_date' => '2025-06-05', 'total_price' => 260.00],
            ['email' => 'ethan@example.com', 'vehicule_id' => 3, 'start_date' => '2025-05-03', 'end_date' => '2025-05-06', 'total_price' => 240.00],
            ['email' => 'fay@example.com', 'vehicule_id' => 3, 'start_date' => '2025-06-10', 'end_date' => '2025-06-12', 'total_price' => 160.00],
            ['email' => 'george@example.com', 'vehicule_id' => 4, 'start_date' => '2025-04-22', 'end_date' => '2025-04-24', 'total_price' => 110.00],
            ['email' => 'hannah@example.com', 'vehicule_id' => 4, 'start_date' => '2025-05-12', 'end_date' => '2025-05-14', 'total_price' => 110.00],
            ['email' => 'ian@example.com', 'vehicule_id' => 5, 'start_date' => '2025-04-28', 'end_date' => '2025-05-02', 'total_price' => 300.00],
            ['email' => 'julia@example.com', 'vehicule_id' => 5, 'start_date' => '2025-06-03', 'end_date' => '2025-06-07', 'total_price' => 300.00],
            ['email' => 'karl@example.com', 'vehicule_id' => 6, 'start_date' => '2025-05-15', 'end_date' => '2025-05-17', 'total_price' => 190.00],
            ['email' => 'lara@example.com', 'vehicule_id' => 6, 'start_date' => '2025-06-01', 'end_date' => '2025-06-04', 'total_price' => 285.00],
            ['email' => 'matt@example.com', 'vehicule_id' => 7, 'start_date' => '2025-04-18', 'end_date' => '2025-04-21', 'total_price' => 150.00],
            ['email' => 'nina@example.com', 'vehicule_id' => 7, 'start_date' => '2025-05-22', 'end_date' => '2025-05-25', 'total_price' => 150.00],
            ['email' => 'oliver@example.com', 'vehicule_id' => 8, 'start_date' => '2025-04-27', 'end_date' => '2025-04-30', 'total_price' => 270.00],
            ['email' => 'penny@example.com', 'vehicule_id' => 8, 'start_date' => '2025-05-15', 'end_date' => '2025-05-18', 'total_price' => 270.00],
            ['email' => 'quentin@example.com', 'vehicule_id' => 9, 'start_date' => '2025-04-15', 'end_date' => '2025-04-18', 'total_price' => 210.00],
            ['email' => 'rita@example.com', 'vehicule_id' => 9, 'start_date' => '2025-05-20', 'end_date' => '2025-05-23', 'total_price' => 210.00],
        ]);
    }
}
