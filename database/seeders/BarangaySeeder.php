<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barangay;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 1000; $i++) {
            Barangay::factory()->create([
                'barangay_code' => 'BP-' . str_pad($i, 4, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
