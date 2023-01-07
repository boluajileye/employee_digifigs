<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * @var $fillable
    */
    protected $fillable = [
        'id', 
        'firstname', 
        'lastname', 
        'age', 
        'work_department', 
        'email', 
        'work_quality',
        'task_completion',
        'over_and_abroad',
        'communication',
        'reason'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
