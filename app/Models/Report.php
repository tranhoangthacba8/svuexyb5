<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'workingType',
        'workingTime',
        'projectId',
        'detail',
        'date',
        'userId',
        'positionId'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function Position()
    {
        return $this->belongsTo(Position::class, 'positionId', 'id');
    }

    public function Project()
    {
        return $this->belongsTo(Project::class, 'projectId', 'id');
    }
}
