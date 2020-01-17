<?php


namespace App\Traits;

use App\Models\Blog\Category;

trait ServiceTrait
{

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable')->withTimestamps();
    }

    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
            ' . $this->getEditButtonAttribute('edit-service', 'admin.service.edit') . '
            ' . $this->getDeleteButtonAttribute('delete-service', 'admin.service.destroy') . '
        </div>';
    }
}
