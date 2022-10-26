<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::all();
        $data=['data'=>$trainings];

        return $data;
    }

    public function store(Request $request)
    {
        if (auth()->user()->type == 2) {

            $training = new Training();
            $training->name = $request->name;
            $training->capacity = $request->capacity;
            $training->dateIn = $request->dateIn;
            $training->dateOut = $request->dateOut;
            $training->date = $request->date;
            $training->save();
            $result =['result'=>'done'];
        }
        return $result;
    }
}
