<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasUuids;
    protected $table="post";
    
    protected $fillable=["post_content","post_author"];
    protected $guarded=["uuid"];
    public function comments(){
        return $this ->HasMany(Comment::class);
    }
    public function tags(){
        return $this ->HasMany(Tag::class);
    }
}
