<?php


namespace App\Traits;


use App\Models\Module\Module;

trait SubModuleTrait
{
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getViewButtonAttribute('show-sub-module', 'admin.sub-module.show').'
                    '.$this->getEditButtonAttribute('edit-sub-module', 'admin.sub-module.edit').'
                    '.$this->getDeleteButtonAttribute('delete-sub-module', 'admin.sub-module.destroy').'
                </div>';
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'In-active';
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
