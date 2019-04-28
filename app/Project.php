<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Circle;
use App\User;

class Project extends Model
{
    protected $fillable =[

        "name", "description","goals","circle_id","is_active","user_id"
    ];

    public function circles()
    {
        return $this->belongsToMany(Circle::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
