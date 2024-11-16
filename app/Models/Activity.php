<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ParkActivity;
use Illuminate\Support\Str;

class Activity extends Model
{
    protected $fillable = [
        "name"
    ];

    public function parkActivities() {
        return $this->hasMany(ParkActivity::class);
    }

    protected static function booted(){
        static::creating(function($activity){
            $activity->slug = $activity->generateUniqueSlug($activity->name);
        });
    }

    private function generateUniqueSlug($name) {
        $slug = Str::slug($name);

        $count = Activity::where("slug", "like", $slug . "%")->count();

        if($count) {
            $slug = $slug . "-" . ($count + 1);
        }

        return $slug;
    }
}
