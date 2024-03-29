<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\questionnaire;
use App\Models\Question;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleEmail;
use App\Models\User;
use App\Models\Role;

class QuestionnairesController extends Controller
{

    public function index(){
         return questionnaire::withCount('questions')->get();
    }
    public function store(Request $request){
       $questionnaire = questionnaire::create($request->all());
      $physicsQuestions= [
              [
                'questionaire_id' => $questionnaire->id,
                'question'=> 'On which of the following Resistivity does not depend ?',
                'options'=> json_encode(['The dimensions of the conductor',
                 'The material of the conductor',
                    'Temperature',
                    'None of the above',
                    'Not Attempted',]),
                'correctans' => 'The dimensions of the conductor'
              ],
              [
                'questionaire_id'=> $questionnaire->id,
                'question' => 'The relationship between radius of curvature (R) and focal length (f) of a spherical mirror is ',
                'options' => json_encode([
                    'R=f',
                    'R=1/2f',
                    'R=2f',
                    'R=0.25f',
                    'Not Attempted',
                ]),
                'correctans' => 'R=2f'
            ],
            [
                'questionaire_id' => $questionnaire->id,
                'question' => 'The image formed by concave mirror is real, inverted and of the same size as that of the object. The position of the object should be',
                'options' => json_encode([
                  'at the focus',
                  'at the centre of curvature',
                  'between the focus and centre of curvature',
                  'beyond the centre of curvature',
                  'Not Attempted'
                ]),
                'correctans' => 'at the centre of curvature'
            ], [
                'questionaire_id' => $questionnaire->id,
                'question' => 'The weight of an object on the surface of the moon is 60 N. What will be its weight on the surface of the earth ?',
                'options' => json_encode([
                    '10N',
                    '36N',
                    '100N',
                    '360N',
                    'Not Attempted'
                ]),
                'correctans' => '360N'
            ],
            [
                'questionaire_id' => $questionnaire->id,
                'question' => 'The weight of an object on the surface of the moon is 60 N. What will be its weight on the surface of the earth ?',
                'options' => json_encode([
                    '10N',
                    '36N',
                    '100N',
                    '360N',
                    'Not Attempted'
                ]),
                'correctans' => '360N'
            ]
            ,
            [
                'questionaire_id' => $questionnaire->id,
                'question' => 'what type of waves are light wave ?',
                'options' => json_encode([
                    'Transverse wave',
                    'Longitudinal wave',
                    'Both A & B',
                    'None',
                ]),
                'correctans' => 'Transverse wave'
            ],
            [
                'questionaire_id' => $questionnaire->id,
                'question' => 'A 220 V , 100 W bulb is connected to a 110 V source. Calculate the power consumed by the bulb.',
                'options' => json_encode([
                    '10W',
                    '15W',
                    '207W',
                    '25W',
                ]),
                'correctans' => '25W'
            ],
            [
                'questionaire_id' => $questionnaire->id,
                'question' => 'The instrument_____ is used for detecting electric current is ',
                'options' => json_encode([
                    'Galvanometer',
                    'Tube tester',
                    'Altimeter',
                    'Fathometer',
                ]),
                'correctans' => 'Galvanometer'
            ],
            [
                'questionaire_id' => $questionnaire->id,
                'question' => 'A body of 20 kg is lying at rest. Under the action of a constant force, it gains a speed of 7 m/s. The work done by the force will be',
                'options' => json_encode([
                    '490J',
                    '500J',
                    '390J',
                    '430J',
                ]),
                'correctans' => '490J'
            ],
            [
                'questionaire_id' => $questionnaire->id,
                'question' => 'A car, initially at rest travels 20m in 4 sec along a straight line with constant acceleration . Find the acceleratio of car ?',
                'options' => json_encode([
                    '4.9 m/s²',
                    '2.5 m/s² ',
                    '0.4 m/s²',
                    '1.6m/s²',
                ]),
                'correctans' => '2.5 m/s² '
            ],
            [
                'questionaire_id' => $questionnaire->id,
                'question' => 'How much work is done in moving a charge of 5 C across two points having a potential difference of 16 v?',
                'options' => json_encode([
                    '65J',
                    '45J',
                    '40J',
                    '80J',
                ]),
                'correctans' => '80J'
            ]
              ];
              try {
                    foreach ($physicsQuestions as $key => $physicsQuestion) {

                        Question::create($physicsQuestion);
                    }
                    $data =['name'=>"manish",'email'=>"manishroy9824@gmail.com"];
                    $user = [
                        [
                         'name' => "manish"
                        ],[
                            'name'=>'rohan'
                        ]
                        ];

                    // Mail::to('manishroy9824@gmail.com')->send(new SampleEmail($data));
                    // return dd("created successfully");
              } catch (\Throwable $th) {
                return  dd($th);
              }

        return response()->json(["Success"=>"Questionnaire created SuccessFully"]);
    }


}
