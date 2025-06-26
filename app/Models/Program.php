<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table="program";
    protected $fillable=["name","describtion"];
    protected $guarded=["id"];
    public function doctors(){
        return $this->belongsToMany(Doctor::class);
    }
}
