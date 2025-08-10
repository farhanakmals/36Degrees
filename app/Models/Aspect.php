<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspect extends Model
{
    protected $fillable = ['name', 'target'];

    public function scores()
    {
        return $this->hasMany(EmployeeScore::class);
    }

    public function employees()
    {
        return $this->belongsToMany(User::class, 'employee_scores')
                    ->withPivot('score')
                    ->withTimestamps();
    }
}
