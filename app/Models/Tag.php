<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasUuids;
    protected $table="tag";
    protected $fillable=["tag_name","post_id"];
    protected $guarded=["id"];
    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
