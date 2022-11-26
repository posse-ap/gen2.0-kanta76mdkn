<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StudyContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_contents')->insert(
            [
                // listのデータ
                ['content' => 'N予備校',
                'color' => '#0445ec',
                ],
                ['content' => 'POSSE課題',
                'color' => '#0f70bd',
                ],
                ['content' => 'ドットインストール',
                'color' => '#20bdde',
                ],
                ['content' => '青本',
                'color' => '#3ccefe',
                ],
                ['content' => 'YouTube',
                'color' => '#b29ef3',
                ],
                ['content' => 'Udemy',
                'color' => '#4a17ef',
                ],
            ]    
            );

    }
}
