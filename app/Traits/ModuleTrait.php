<?php


namespace App\Traits;


use App\Models\Module\SubModule;

trait ModuleTrait
{
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getViewButtonAttribute('show-module', 'admin.module.show').'
                    '.$this->getEditButtonAttribute('edit-module', 'admin.module.edit').'
                    '.$this->getDeleteButtonAttribute('delete-module', 'admin.module.destroy').'
                </div>';
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'In-active';
    }

    public function sub_modules()
    {
        return $this->hasMany(SubModule::class);
    }
}
