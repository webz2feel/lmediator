<?php


namespace App\Traits;


use App\Models\Admin\Admin;
use Illuminate\Support\Str;

trait EmailTrait
{
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getViewButtonAttribute('show-email', 'admin.email.show').'
                    '.$this->getEditButtonAttribute('edit-email', 'admin.email.edit').'
                    '.$this->getDeleteButtonAttribute('delete-email', 'admin.email.destroy').'
                </div>';
    }

    public function getCreatedByNameAttribute()
    {
        return Admin::where('id', $this->created_by)->get()->pluck('full_name')->first();
    }

    public function getUpdatedByNameAttribute()
    {
        return Admin::where('id', $this->updated_by)->get()->pluck('full_name')->first();
    }
    public function getStatusAttribute()
    {
        return $this->active ? 'Active' : 'In-active';
    }

    public function getPromotionalAttribute()
    {
        return $this->is_promotional ? 'Promotional' : 'Non Promotional';
    }
}
