<?php

namespace App\Http\Controllers;

use App\Models\Asignment;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;

class AsignmentController extends Controller
{
    public function index(Request $request)
    {
        $asignments = Asignment::where('user_id', '=', auth()->id())->get();
        foreach ($asignments as $asignment){
            $training = Training::find($asignment['training_id']);
            $asignment['training_name'] = $training->name;
            $asignment['training_date'] = $training->date;
        }
        $data=['data'=>$asignments];

        return $data;
    }

    public function store(Request $request)
    {
            $asignment = new Asignment();
            $asignment->date = now();
            $asignment->training_id = $request->id;
            $asignment->user_id = auth()->id();
            $asignment->save();
            $result =['result'=>'done'];

        return $result;
    }

    public function delete(Request $request)
    {
            $asignment = Asignment::find($request->id);
            $asignment->delete();
            $result =['result'=>'done'];

        return $result;
    }
}
