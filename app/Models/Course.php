<?php

namespace App\Models;

use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    protected $fillable = ['title', 'slug', 'summary', 'description', 'status', 'image_path', 'video_path', 'welcome_message', 'good_bye_message', 'observation', 'user_id', 'level_id', 'category_id', 'price_id', 'plublished_at'];

    protected $casts = [
        'status' => CourseStatus::class,
        'plublished_at' => 'datetime',
    ];

    protected function image(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->image_path ? Storage::url($this->image_path) : 'https://icrier.org/wp-content/uploads/2022/12/media-Event-Image-Not-Found.jpg';
            },
        );
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    // Relaciones uno a mucho

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function requirements(){
        return $this->hasMany(Requirement::class);
    }
}
