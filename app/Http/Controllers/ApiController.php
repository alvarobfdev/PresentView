<?php
/**
 * Created by PhpStorm.
 * User: alvarobanofos
 * Date: 16/1/16
 * Time: 12:49
 */

namespace App\Http\Controllers;


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

    public function getQuestions(){
        $questions = question::with('answers')->where("time_ini", ">",Carbon::now()->toDateTimeString())->get();
        return $questions;
    }

    public function getRevision() {
        return Revision::find(1);
    }
}