<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $districts = [
            ['name' => 'Gujrat', 'status' => 'active'],
            ['name' => 'Gujranwala', 'status' => 'active'],
            ['name' => 'Hafizabad', 'status' => 'active'],
            ['name' => 'Jhang', 'status' => 'active'],
            ['name' => 'Jhelum', 'status' => 'active'],
            ['name' => 'Kasur', 'status' => 'active'],
            ['name' => 'Khanewal', 'status' => 'active'],
            ['name' => 'Lahore', 'status' => 'active'],
        ];

        foreach ($districts as $district) {
            District::create($district);
        }
    }
}
