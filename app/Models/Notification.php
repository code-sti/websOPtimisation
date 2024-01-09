<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Notification extends Model
{
    use Notifiable;

    protected $fillable = ['message', 'users'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
