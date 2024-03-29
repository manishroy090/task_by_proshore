<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\questionnaire;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function questionnaire(){
    //     return $this->belongsTo(questionnaire::class, 'questionaire_id','id');
    // }

    protected $casts = [
            'options'=> 'array'
    ];

}
