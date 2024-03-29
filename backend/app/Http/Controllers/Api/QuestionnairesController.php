<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\questionnaire;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\Support\Facades\URL;

use App\Helper;
use GuzzleHttp\Psr7\Uri;

class QuestionnairesController extends Controller
{

    public function index()
    {
        try {

            return
                DB::table('questionnaires')
                ->leftJoin('questions', 'questionnaires.id', '=', 'questions.questionaire_id')
                ->select(
                    'questionnaires.title',
                    'questionnaires.expiry_date',
                    DB::raw('COUNT(CASE WHEN questions.subject = "chemistry" THEN questions.id END) + COUNT(CASE WHEN questions.subject = "physics" THEN questions.id END) AS total_count'),
                    DB::raw('COUNT(CASE WHEN questions.subject = "chemistry" THEN questions.id END) AS chemistry_question_count'),
                    DB::raw('COUNT(CASE WHEN questions.subject = "physics" THEN questions.id END) AS physics_question_count')
                )->where('expiry_date', '>', Carbon::now())
                ->groupBy('questionnaires.id', 'questionnaires.title', 'questionnaires.expiry_date')
                ->get();
        } catch (\Throwable $th) {
        }
    }
    public function store(Request $request)
    {
        $questionnaire = questionnaire::create($request->all());
        generateRandomQuestions($questionnaire->id);
        $students = User::whereHas('role', function ($query) {
            $query->where('name', 'STUDENT');
        })->get();
        foreach ($students as $key => $student) {
            $student->update(['unique_url' => uniqueUrl()]);
        }

        sendEmail($students, $questionnaire->id);
        return response()->json(["Success" => "Questionnaire created SuccessFully"]);
    }
}
