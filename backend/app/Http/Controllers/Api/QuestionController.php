<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use App\Models\StudentAnswer;
use Illuminate\Support\Facades\Crypt;
use Psy\Readline\Hoa\Console;

class QuestionController extends Controller
{
    public function questions($questionnaireId)
    {
        $physicsQuestions = Question::where('questionaire_id', $questionnaireId)->where('subject', 'physics')->get();
        $chemistryQuestions = Question::where('questionaire_id', $questionnaireId)->where('subject', 'chemistry')->get();
        return ['physicsQuestions' => $physicsQuestions, 'chemistryQuestions' => $chemistryQuestions];
    }

    public function store(Request $request)
    {
        $QuestionsAnswers = $request->all();
        $answerBy = $QuestionsAnswers['id']['id'];
        unset($QuestionsAnswers['id']);
        foreach ($QuestionsAnswers as $key => $questionAnswer) {
            $StudentAnswer = new StudentAnswer();
            $StudentAnswer->question_no = $key;
            $StudentAnswer->answer_by = $answerBy;
            $StudentAnswer->answer = $questionAnswer;
            $StudentAnswer->save();
        }
    }
    public function emailLink($code, $questionnaireId)
    {
        $shorturl = env('Frontend_URL') . $code;
        $existuniqueurl = User::where('unique_url', $shorturl)->first();
        if ($existuniqueurl != null) {
            $examUrl = env('Frontend_URL') . "questions/" . $existuniqueurl->id . "/" . $questionnaireId;
            return redirect($examUrl);
        } else {
            abort(404);
        }
    }
}
