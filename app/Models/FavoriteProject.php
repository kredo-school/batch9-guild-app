<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteProject extends Model
{
    protected $table = 'favorite_projects';

    protected $fillable = [
        'user_id',
        'project_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
