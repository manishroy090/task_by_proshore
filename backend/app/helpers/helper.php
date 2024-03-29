<?php

use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleEmail;

function generateRandomQuestions($questionnaireID)
{

    $randomQuestions = [
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'On which of the following Resistivity does not depend ?',
            'subject' => "physics",
            'options' => json_encode([
                'The dimensions of the conductor',
                'The material of the conductor',
                'Temperature',
                'None of the above',
                'Not Attempted',
            ]),
            'correctans' => 'The dimensions of the conductor'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'The relationship between radius of curvature (R) and focal length (f) of a spherical mirror is ',
            'subject' => "physics",
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
            'questionaire_id' => $questionnaireID,
            'question' => 'The image formed by concave mirror is real, inverted and of the same size as that of the object. The position of the object should be',
            'subject' => "physics",
            'options' => json_encode([
                'at the focus',
                'at the centre of curvature',
                'between the focus and centre of curvature',
                'beyond the centre of curvature',
                'Not Attempted'
            ]),
            'correctans' => 'at the centre of curvature'
        ], [
            'questionaire_id' => $questionnaireID,
            'question' => 'The weight of an object on the surface of the moon is 60 N. What will be its weight on the surface of the earth ?',
            'subject' => "physics",
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
            'questionaire_id' => $questionnaireID,
            'question' => 'The weight of an object on the surface of the moon is 60 N. What will be its weight on the surface of the earth ?',
            'subject' => "physics",
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
            'questionaire_id' => $questionnaireID,
            'question' => 'what type of waves are light wave ?',
            'subject' => "physics",
            'options' => json_encode([
                'Transverse wave',
                'Longitudinal wave',
                'Both A & B',
                'None',
            ]),
            'correctans' => 'Transverse wave'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'A 220 V , 100 W bulb is connected to a 110 V source. Calculate the power consumed by the bulb.',
            'subject' => "physics",
            'options' => json_encode([
                '10W',
                '15W',
                '207W',
                '25W',
            ]),
            'correctans' => '25W'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'The instrument_____ is used for detecting electric current is ',
            'subject' => "physics",
            'options' => json_encode([
                'Galvanometer',
                'Tube tester',
                'Altimeter',
                'Fathometer',
            ]),
            'correctans' => 'Galvanometer'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'A body of 20 kg is lying at rest. Under the action of a constant force, it gains a speed of 7 m/s. The work done by the force will be',
            'subject' => "physics",
            'options' => json_encode([
                '490J',
                '500J',
                '390J',
                '430J',
            ]),
            'correctans' => '490J'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'A car, initially at rest travels 20m in 4 sec along a straight line with constant acceleration . Find the acceleratio of car ?',
            'subject' => "physics",
            'options' => json_encode([
                '4.9 m/s²',
                '2.5 m/s² ',
                '0.4 m/s²',
                '1.6m/s²',
            ]),
            'correctans' => '2.5 m/s² '
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'What is the chemical symbol for sodium?',
            'subject' => "chemistry",
            'options' => json_encode([
                'So',
                'Na',
                'Sn',
                'Ns',
            ]),
            'correctans' => 'Na'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'What is the term for a substance that speeds up a chemical reaction without being consumed in the process?',
            'subject' => "chemistry",
            'options' => json_encode([
                'Reactant',
                'Product',
                'Catalyst',
                'Inhibitor',
            ]),
            'correctans' => 'Catalyst'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'What is the pH value of a neutral solution?',
            'subject' => "chemistry",
            'options' => json_encode([
                '0',
                '7',
                '14',
                '-7',
            ]),
            'correctans' => '7'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'Which element has the atomic number 6?',
            'subject' => "chemistry",
            'options' => json_encode([
                'Nitrogen',
                'Oxygen',
                'Carbon',
                'Hydrogen',
            ]),
            'correctans' => 'Carbon'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'What is the chemical formula for water?',
            'subject' => "chemistry",
            'options' => json_encode([
                'H2O2',
                'CO2',
                'H2O',
                'CH4',
            ]),
            'correctans' => 'H2O'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'Which gas is most abundant in Earth"s atmosphere?',
            'subject' => "chemistry",
            'options' => json_encode([
                'Oxygen (O2)',
                'Nitrogen (N2)',
                'Carbon dioxide (CO2)',
                'Hydrogen (H2)',
            ]),
            'correctans' => 'Nitrogen (N2)'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'What is the process by which a solid changes directly into a gas without passing through the liquid phase?',
            'subject' => "chemistry",
            'options' => json_encode([
                'Vaporization',
                'Condensation',
                'Sublimation',
                'Evaporation',
            ]),
            'correctans' => 'Sublimation'
        ], [
            'questionaire_id' => $questionnaireID,
            'question' => 'What is the chemical symbol for gold?',
            'subject' => "chemistry",
            'options' => json_encode([
                'Ag',
                'Au',
                'Al',
                'Fe',
            ]),
            'correctans' => 'Au'
        ], [
            'questionaire_id' => $questionnaireID,
            'question' => 'What is the term for a substance that cannot be broken down into simpler substances by chemical means?',
            'subject' => "chemistry",
            'options' => json_encode([
                'Compound',
                'Mixture',
                'Element',
                'Solution',
            ]),
            'correctans' => 'Element'
        ],
        [
            'questionaire_id' => $questionnaireID,
            'question' => 'What is the chemical formula for table salt?',
            'subject' => "chemistry",
            'options' => json_encode([
                'NaCl2',
                'NaCl',
                'HCl',
                'Na2Cl',
            ]),
            'correctans' => 'Element'
        ]
    ];

    try {
        foreach ($randomQuestions as $key => $randomQuestion) {
            Question::create($randomQuestion);
        }
    } catch (\Throwable $th) {
        dd($th);
    }
}

function uniqueUrl()
{
    return env('Frontend_URL') . Str::random(6);
}

function sendEmail($students, $questionnaireId)
{
    $data = ['name' => "manish", 'email' => "manishroy9824@gmail.com"];
    try {
        foreach ($students as $key => $student) {
            $student['questionnaireId'] = $questionnaireId;
            Mail::to($student->email)->send(new SampleEmail($student->toArray()));
        }
        // Mail::to("manishroy9824@gmail.com")->send(new SampleEmail(['Userid'=>1,'name'=>"manish", 'unique_url'=>'http://localhost:3000/HDW82q']));
    } catch (\Throwable $th) {
        return dd($th);
    }
}
