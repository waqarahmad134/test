<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tehsil;
use App\Models\District;

class TehsilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Fetch the Lahore district
        $lahoreDistrict = District::where('name', 'Lahore')->first();

        if ($lahoreDistrict) {
            $tehsils = [
                ['name' => 'Lahore Cantt Tehsil', 'status' => 'active', 'district_id' => $lahoreDistrict->id],
                ['name' => 'Lahore City', 'status' => 'active', 'district_id' => $lahoreDistrict->id],
                ['name' => 'Model Town', 'status' => 'active', 'district_id' => $lahoreDistrict->id],
                ['name' => 'Raiwind', 'status' => 'active', 'district_id' => $lahoreDistrict->id],
                ['name' => 'Shalimar', 'status' => 'active', 'district_id' => $lahoreDistrict->id],
            ];

            foreach ($tehsils as $tehsil) {
                Tehsil::create($tehsil);
            }
        } else {
            echo "District 'Lahore' not found. Please seed districts first.";
        }
    }
}
