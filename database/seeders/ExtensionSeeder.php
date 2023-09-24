<?php

namespace Database\Seeders;

use App\Models\Extension;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $extensions = [
            "I",
            "II",
            "III",
            "IV",
            "JR"
        ];


        foreach ($extensions as $extension) {
            Extension::create(
                [
                    'extension' => $extension
                ]
            );
        }
    }
}