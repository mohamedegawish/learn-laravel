<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = "doctor";
    protected $fillable = ["name"];
    protected $guarded = ["id"];
    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

}
