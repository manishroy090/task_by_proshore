<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function questions()
    {
        return Question::all();
    }

    public function store(Request $request){
            dd($request->all());
    }
}
