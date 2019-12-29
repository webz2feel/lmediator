<?php


namespace App\Traits;



trait PageTrait
{
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
            '.$this->getEditButtonAttribute('edit-page', 'admin.page.edit').'
            '.$this->getDeleteButtonAttribute('delete-page', 'admin.page.destroy').'
        </div>';
    }
}
