<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestionController extends Controller
{
    public function fetchInsert(){
        $response = Http::get('https://quizapi.io/api/v1/questions',
        [
          'apiKey' => 'RK9pIl97HjiyCihtFUUXRuFFvNZN0HPxrWwACAsU',
          'limit' => 10,
        ]);

        $questions = json_decode($response->body());

        return $questions;

        foreach( $questions as $q){
            $question = new Question();
            $question->question = $q->question;
            $question->answer_a = $q->answer_a;
            $question->answer_b = $q->answer_b;
            $question->answer_c = $q->answer_c;
            $question->answer_d = $q->answer_d;
            $question->answer_e = $q->answer_e;
            $question->answer_f = $q->answer_f;
            $question->save();
        }

        return "Data Fetch From Api And Store in The Data Base";

    }
}
