<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            ["BSCS", "Batchelor of Science in Computer Science"],
            ["BSIT", "Batchelor of Science in Information Technology"],
            ["BLIS", "Batchelor of Library of Information Science"],
            ["BSIS", "Batchelor of Science in Information Science"]

        ];
        foreach ($programs as $program) {
            Program::create(
                [
                    'code' => $program[0],
                    'name' => $program[1]
                ]
            );
        }
    }
}