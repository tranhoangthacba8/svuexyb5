<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'revenue',
        'duration',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class, 'projectId', 'id');
    }

    public function projectUsers()
    {
        return $this->hasMany(ProjectUser::class, 'projectId', 'id');
    }
}
