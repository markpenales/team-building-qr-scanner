<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                YearSeeder::class,
                SectionSeeder::class,
                ProgramSeeder::class,
                ExtensionSeeder::class,
                StudentSeeder::class,
            ]
        );
    }
}