<?php

 namespace App\Traits;

 use App\Models\Like;
 use App\Models\User;
 use Illuminate\Database\Eloquent\Relations\MorphMany;

 trait HasLikes
 {

     protected static function bootHasLikes()
     {
         static::deleting(function ($model) {
             $model->likes()->delete();
             $model->unsetRelation('likes');
         });
     }

     public function likes(): MorphMany
     {
         return $this->morphMany(Like::class, 'likeable');
     }

     public function likedBy(User $user)
     {
         $this->likes()->create(['user_id' => $user->id()]);

         $this->unsetRelation('likes');
     }

     public function dislikedBy(User $user)
     {
         optional($this->likes()->where('user_id', $user->id())->first())->delete();

         $this->unsetRelation('likes');
     }

     public function isLikedBy(User $user): bool
     {
         return $this->likes()->where('user_id', $user->id())->exists();
     }

 }

