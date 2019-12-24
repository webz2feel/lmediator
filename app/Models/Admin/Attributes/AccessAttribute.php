<?php

namespace App\Models\Admin\Attributes;

trait AccessAttribute
{
    public function getFullNameAttribute($value)
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getEditButtonAttribute('edit-user', 'admin.user.edit').'
                    '.$this->getDeleteButtonAttribute('delete-user', 'admin.user.destroy').'
                    '.$this->getSettingsButtonAttribute('view-permission', 'admin.user.destroy').'
                </div>';
    }
}
