<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H'
        ];


        foreach ($sections as $section) {
            Section::create(
                [
                    'name' => $section,
                ]
            );
        }

    }
}