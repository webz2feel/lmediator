<?php

namespace App\Models\Admin\Attributes;

trait AccessAttribute
{
    public function getFullNameAttribute($value)
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getLastLoginAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d F Y H:i:s');
    }

    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getViewButtonAttribute('show-detail', 'admin.user.show').'
                    '.$this->getEditButtonAttribute('edit-user', 'admin.user.edit').'
                    '.$this->getDeleteButtonAttribute('delete-user', 'admin.user.destroy').'
                </div>';
    }
}
