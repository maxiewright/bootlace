<?php

namespace App\Models;

use App\Traits\HasLikes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory, HasLikes;


    protected $fillable = [
        'image_path',
        'title',
        'slug',
        'body',
        'author',
        'status_id',
        'parent'
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function (Article $article){
            if (! $article->slug) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'parent');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }


}
