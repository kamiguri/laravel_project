<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeSearch(Builder $query, $keywords) {
        $keywordArray = explode(' ', $keywords);

        $firstKeyword = array_shift($keywordArray);
        $query->where('text', 'like', "%{$firstKeyword}%");

        if (count($keywordArray) > 0) {
            foreach ($keywordArray as $keyword) {
                $query->orWhere('name', 'like', "%{$keyword}%");
            }
        }
    }
}
