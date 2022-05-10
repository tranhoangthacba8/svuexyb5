<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function Reports(){
        return $this->hasMany(Report::class,'projectId','id');
    }
    public function ProjectUsers(){
        return $this->hasMany(ProjectUser::class,'projectId','id');
    }
}
