<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class,'projectId','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }
    public function position(){
       return $this->belongsTo(Position::class,'positionId','id');
    }
}
