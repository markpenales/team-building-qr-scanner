<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $years = [
            [1, "First"],
            [2, "Second"],
            [3, "Third"],
            [4, "Fourth"],
        ];

        foreach ($years as $year) {
            Year::create(
                [
                    'year' => $year[0],
                    'name' => $year[1]
                ]
            );
        }
    }
}