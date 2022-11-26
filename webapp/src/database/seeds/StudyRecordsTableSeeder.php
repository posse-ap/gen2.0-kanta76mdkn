<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyRecordsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_records')->insert(
            [
                // listのデータ
                [
                    'study_dates' => '2022-10-11',
                    'study_times' => '7',
                    'language_id' => '8',
                    'content_id' => '6',
                ],
                [
                    'study_dates' => '2022-10-11',
                    'study_times' => '6',
                    'language_id' => '7',
                    'content_id' => '5',
                ],
                [
                    'study_dates' => '2022-10-15',
                    'study_times' => '5',
                    'language_id' => '6',
                    'content_id' => '4',
                ],
                [
                    'study_dates' => '2022-10-20',
                    'study_times' => '4',
                    'language_id' => '5',
                    'content_id' => '3',
                ],
                [
                    'study_dates' => '2022-10-22',
                    'study_times' => '3',
                    'language_id' => '4',
                    'content_id' => '2',
                ],
                [
                    'study_dates' => '2022-10-30',
                    'study_times' => '5',
                    'language_id' => '3',
                    'content_id' => '1',
                ],
                [
                    'study_dates' => '2022-11-1',
                    'study_times' => '7',
                    'language_id' => '2',
                    'content_id' => '4',
                ],
                [
                    'study_dates' => '2022-11-3',
                    'study_times' => '11',
                    'language_id' => '1',
                    'content_id' => '4',
                ],
                [
                    'study_dates' => '2022-11-3',
                    'study_times' => '3',
                    'language_id' => '5',
                    'content_id' => '2',
                ],
                [
                    'study_dates' => '2022-11-13',
                    'study_times' => '10',
                    'language_id' => '2',
                    'content_id' => '3',
                ],
                [
                    'study_dates' => '2022-11-15',
                    'study_times' => '1',
                    'language_id' => '8',
                    'content_id' => '5',
                ],
                [
                    'study_dates' => '2022-11-15',
                    'study_times' => '3',
                    'language_id' => '5',
                    'content_id' => '2',
                ],
                [
                    'study_dates' => '2022-11-18',
                    'study_times' => '8',
                    'language_id' => '6',
                    'content_id' => '2',
                ],
                [
                    'study_dates' => '2022-11-23',
                    'study_times' => '4',
                    'language_id' => '7',
                    'content_id' => '1',
                ],
                [
                    'study_dates' => '2022-11-26',
                    'study_times' => '2',
                    'language_id' => '3',
                    'content_id' => '1',
                ],
                [
                    'study_dates' => '2022-11-27',
                    'study_times' => '2',
                    'language_id' => '3',
                    'content_id' => '1',
                ],
                [
                    'study_dates' => '2022-11-28',
                    'study_times' => '4',
                    'language_id' => '6',
                    'content_id' => '3',
                ],
                [
                    'study_dates' => '2022-11-29',
                    'study_times' => '7',
                    'language_id' => '8',
                    'content_id' => '6',
                ],
                [
                    'study_dates' => '2022-11-30',
                    'study_times' => '7',
                    'language_id' => '8',
                    'content_id' => '6',
                ],
                [
                    'study_dates' => '2022-11-30',
                    'study_times' => '4',
                    'language_id' => '2',
                    'content_id' => '1',
                ],
                [
                    'study_dates' => '2022-11-31',
                    'study_times' => '2',
                    'language_id' => '4',
                    'content_id' => '2',
                ],
            ]
        );
    }
}
