<?php

namespace Database\Seeders;

use App\Models\Controls;
use App\Models\User;

use App\Models\Devices;
use App\Models\Foods;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $food = Foods::create([
            'name' => 'Dog Food',
            'weight' => 500,
            'expired_at' => '2025-12-31',
            'current_stock' => 10
        ]);

        $device = Devices::create([
            'name' => 'Feeder 1',
            'food_id' => $food->id,
            'status' => 0,
            'capacity' => '100gr',
            'connections' => 'http://192.168.1.1',
            'connection_status' => 1,
            'latest_active' => now()
        ]);

        Controls::create([
            'device_id' => $device->id,
            'name' => 'Morning Feeding',
            'category' => 'schedule',
            'time_start' => now(),
            'time_end' => now()->addMinutes(10)
        ]);

    }
}
