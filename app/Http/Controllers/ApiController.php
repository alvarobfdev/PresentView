<?php
/**
 * Created by PhpStorm.
 * User: alvarobanofos
 * Date: 16/1/16
 * Time: 12:49
 */

namespace App\Http\Controllers;


use App\Models\Answers;
use App\Models\question;
use App\Models\Revision;
use Carbon\Carbon;

class ApiController extends Controller
{

    public function __construct()
    {
       /* if(!array_key_exists("token", $_GET)) {
            \App::abort(401);
        }*/

    }

    public function getQuestions() {
        $questions = question::with('answers')->where("time_end", ">",Carbon::now()->toDateTimeString())->get();
        return $questions;
    }

    public function getRevision() {
        return Revision::find(1);
    }

    public function getAnswers() {
        return Answers::with("question")->get();
    }

    public function getTime() {
        return json_encode(round(microtime(true) * 1000));
    }
}