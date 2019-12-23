<?php


namespace App\Models\Role\Attributes;


trait RoleAttribute
{
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                    '.$this->getEditButtonAttribute('edit-role', 'admin.role.edit').'
                    '.$this->getDeleteButtonAttribute('delete-role', 'admin.role.destroy').'
                </div>';
    }
}
