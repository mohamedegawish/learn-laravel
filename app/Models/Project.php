<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";
    protected $fillable = ['projectName','customer_id'];
    protected $guarded = ['id'];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
