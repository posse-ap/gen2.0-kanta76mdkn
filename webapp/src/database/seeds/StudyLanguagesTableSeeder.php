<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StudyLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_languages')->insert(
            [
                // listのデータ
                ['language' => 'HTML',
                'color' => '#0445ec',
                ],
                ['language' => 'CSS',
                'color' => '#0f70bd',
                ],
                ['language' => 'JavaScript',
                'color' => '#20bdde',
                ],
                ['language' => 'SQL',
                'color' => '#3ccefe',
                ],
                ['language' => 'SHELL',
                'color' => '#b29ef3',
                ],
                ['language' => 'PHP',
                'color' => '#4a17ef',
                ],
                ['language' => 'Laravel',
                'color' => '#3005c0',
                ],
                ['language' => 'その他',
                'color' => '#6c46eb',
                ],
            ]    
            );
    }
}
