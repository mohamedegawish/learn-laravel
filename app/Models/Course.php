<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public static function allCourses(){
        return[
            ["title"=>"Network","credit"=>3],
            ["title"=> "Machine Learning","credit"=>3],
        ];
    }
}
