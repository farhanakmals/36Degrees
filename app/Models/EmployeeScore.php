<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeScore extends Model
{
    protected $fillable = ['user_id', 'aspect_id', 'score', 'scoring_period_id', 'score_real'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aspect()
    {
        return $this->belongsTo(Aspect::class);
    }

    public function period()
    {
        return $this->belongsTo(ScoringPeriod::class, 'scoring_period_id');
    }
}
