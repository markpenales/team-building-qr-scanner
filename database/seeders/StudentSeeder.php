<?php

namespace Database\Seeders;

use App\Models\Extension;
use App\Models\Program;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentSection;
use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directory = public_path('./Participants.xlsx');
        $spreadsheet = IOFactory::load($directory);
        $rowNum = 0;
        foreach ($spreadsheet->getActiveSheet()->toArray() as $row => $value) {
            error_log(implode(' | ', $value));
            if ($rowNum == 0) {
                $rowNum++;
                continue;
            }

            $section = Section::where('name', $value[12])->first()->id;
            $program = Program::where('code', $value[9])->first()->id;
            $year = Year::where('year', $value[10])->first()->id;
            $student = Student::create([
                "code" => $value[0],
                "first_name" => $value[3],
                "middle_initial" => $value[4],
                "last_name" => $value[6],
            ]);

            if ($value[7] != '') {
                $extension = Extension::where('extension', $value[7])->first();

                if ($extension) {
                    $student->update(['extension_id' => Extension::where('extension', $value[7])->first()->id]);

                }
            }

            StudentSection::create(['student_id' => $student->id, 'section_id' => $section, 'program_id' => $program, 'year_id' => $year]);

        }


    }
}