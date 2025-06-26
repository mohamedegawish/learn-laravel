<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table="Customer";
    protected $fillable = ['name','address','phone','email'];
    protected $guarded =['id'];
    public function projects(){
        return $this->hasMany(Project::class);
    } 
}
