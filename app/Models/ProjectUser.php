<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;

    public function Project(){
        return $this->belongsTo(Project::class,'projectId','id');
    }
    public function User(){
        return $this->belongsTo(User::class,'userId','id');
    }
}
