<?php


namespace App\Models\Permission\Attributes;


trait PermissionAttribute
{
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                    '.$this->getEditButtonAttribute('edit-permission', 'admin.permission.edit').'
                    '.$this->getDeleteButtonAttribute('delete-permission', 'admin.permission.destroy').'
                </div>';
    }
}
