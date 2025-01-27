<?php

namespace App\Observers;

use App\Models\Secction;

class SecctionObserver
{
    public function creating(Secction $requirement){
        $requirement->position = Secction::where('course_id', $requirement->course_id)->max('position') + 1;
    }
}
