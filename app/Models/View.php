<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Request;

class View extends Model
{
    use HasFactory;


    public function viewable(): MorphTo
    {
        return $this->morphTo();
    }

    public static function createViewLog($model) {
        auth()->user() ? $userId = auth()->id() : $userId = null;

        $model->views()->create([
            'user_id' => $userId,
            'url' => Request::url(),
            'session_id' => Request::getSession()->getId(),
            'ip' => Request::getClientIp(),
            'agent' => Request::header('User-Agent')
        ]);
    }
}
