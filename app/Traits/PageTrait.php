<?php


namespace App\Traits;



use App\Models\Admin\Admin;
use Illuminate\Support\Str;

trait PageTrait
{
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
            '.$this->getViewButtonAttribute('show-page', 'admin.page.show').'
            '.$this->getEditButtonAttribute('edit-page', 'admin.page.edit').'
            '.$this->getDeleteButtonAttribute('delete-page', 'admin.page.destroy').'
        </div>';
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getCreatedByNameAttribute()
    {
        return Admin::where('id', $this->created_by)->get()->pluck('full_name')->first();
    }

    public function getUpdatedByNameAttribute()
    {
        return Admin::where('id', $this->updated_by)->get()->pluck('full_name')->first();
    }
}
