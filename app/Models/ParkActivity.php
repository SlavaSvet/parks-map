<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Park;
use App\Models\Activity;

class ParkActivity extends Model
{
    protected $fillable = [
        "park_id",
        "activity_id"
    ];

    public function park() {
        return $this->belongsTo(Park::class);
    }

    public function activities() {
        return $this->belongsTo(Activity::class);
    }
}
