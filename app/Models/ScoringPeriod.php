<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoringPeriod extends Model
{
    protected $table = 'scoring_period';
    protected $fillable = ['user_id', 'bulan', 'tahun'];

    public function scores()
    {
        return $this->hasMany(EmployeeScore::class, 'scoring_period_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
