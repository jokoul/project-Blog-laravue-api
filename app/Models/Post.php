<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    protected $fillable = ['title','lead','content','topic_id','author_id'];

    use HasFactory;
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class,'topic_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class,'author_id');//we rename foreign key name from user_id to author_id
    }
}
