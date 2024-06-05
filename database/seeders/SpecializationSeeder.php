<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->insert([
            [
                'name' => 'Medical Checkup',
                'description' => 'Routine health examinations to assess overall health and identify potential medical conditions.',
                'is_active' => true,
            ],
            [
                'name' => 'TB Dots',
                'description' => 'Treatment and management of tuberculosis using the Directly Observed Treatment, Short-course (DOTS) strategy.',
                'is_active' => true,
            ],
            [
                'name' => 'Dental',
                'description' => 'Comprehensive dental care including preventive, diagnostic, and restorative services.',
                'is_active' => true,
            ],
            [
                'name' => 'Animal Bites',
                'description' => 'Assessment, treatment, and management of animal bite injuries to prevent infection and complications.',
                'is_active' => true,
            ],
            [
                'name' => 'Pre-natal & Family Planning',
                'description' => 'Healthcare services for pregnant women and family planning guidance to ensure healthy pregnancies and informed reproductive choices.',
                'is_active' => true,
            ],
            [
                'name' => 'Immunization',
                'description' => 'Administration of vaccines to protect against various infectious diseases and promote community health.',
                'is_active' => true,
            ],
            [
                'name' => 'Swab Test',
                'description' => 'Diagnostic testing using swab samples to detect viral and bacterial infections.',
                'is_active' => true,
            ],
            [
                'name' => 'HIV Test',
                'description' => 'Confidential testing and counseling services for the detection and management of HIV.',
                'is_active' => true,
            ],
        ]);
    }
}
