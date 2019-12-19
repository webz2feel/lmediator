<?php

namespace App\Models\Admin\Attributes;

trait AccessAttribute
{
    public function getFullNameAttribute($value)
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
