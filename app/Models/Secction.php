<?php

namespace App\Models;

use App\Observers\SecctionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([SecctionObserver::class])]

class Secction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'course_id', 'position'];

    public function sections(){
        return $this->belongsTo(Course::class);
    }
}
