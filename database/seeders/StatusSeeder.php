<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'name' => 'Pending',
                'color' => '#ffffff',
                'bgcolor' => '#ffc107',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sent to challan clerk',
                'color' => '#ffffff',
                'bgcolor' => '#dc3545',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Objected/Return to Police',
                'color' => '#ffffff',
                'bgcolor' => '#28a745',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Objection Updated/Removed',
                'color' => '#ffffff',
                'bgcolor' => '#28a745',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Entrusted To',
                'color' => '#ffffff',
                'bgcolor' => '#28a745',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Approved',
                'color' => '#ffffff',
                'bgcolor' => '#28a745',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
