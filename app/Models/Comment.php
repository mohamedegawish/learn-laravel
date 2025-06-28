<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasUuids;
    protected $table="post_comments";
    protected $fillable=["comment_content","comment_author","post_id"];
    protected $guarded=["uuid"];
    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
