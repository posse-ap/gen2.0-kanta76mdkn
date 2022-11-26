<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\StudyRecord;
use App\StudyContents;
use App\StudyLanguages;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class TopPageController extends Controller
{
    public function index()
    {
        $big_questions = DB::table('study_records')->get();
        // 今日の学習時間
        // レコードからdateが一致している勉強時間をとってくる
        $today = StudyRecord::where('study_dates', '=', date('Y-m-d'))->sum('study_times');
        // 今月の学習時間
        $month = StudyRecord::whereYear('study_dates', date('Y'))->whereMonth('study_dates', date('m'))->sum('study_times');
        // 合計の学習時間
        $total = StudyRecord::sum('study_times');

        // 棒グラフのデータ
        // 今月の学習時間、日毎の合計を順番に取ってくる
        $bar = StudyRecord::select(DB::raw("SUM(study_times) as sum"))->whereYear('study_dates', date('Y'))->whereMonth('study_dates', date('m'))->groupby('study_dates')->pluck('sum');
        $bar_date = StudyRecord::whereYear('study_dates', date('Y'))->whereMonth('study_dates', date('m'))->groupby('study_dates')->pluck('study_dates');

        // 円グラフ（学習言語）
        // 言語ごとの合計学習時間合計
        // $language_data = DB::table("study_records")
        // ->groupBy("language_id")
        // ->raw("sum('study_times') as lang_sum"); 
        // ->get();
        $language_data = StudyRecord::leftJoin('study_languages', 'study_records.language_id', '=', 'study_languages.id')
        ->select('study_languages.language', DB::raw("SUM(study_records.study_times) as sum"), 'study_languages.color')
        ->groupBy('study_languages.language', 'study_languages.color')
        ->pluck("sum");
        // dd($language_data);

        $content_data = StudyRecord::leftJoin('study_contents', 'study_records.content_id', '=', 'study_contents.id')
        ->select('study_contents.content', DB::raw("SUM(study_records.study_times) as sum"), 'study_contents.color')
        ->groupBy('study_contents.content', 'study_contents.color')
        ->pluck("sum");


        // トータル学習時間
        return view('top', compact('today', 'month', 'total','bar_date', 'bar','language_data','content_data'));
    }
}


// $questions = Question::where('big_question_id', '=', $id)->get();
