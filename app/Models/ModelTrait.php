<?php


namespace App\Models;


trait ModelTrait
{
    /**
     * @return string
     */
    public function getEditButtonAttribute($permission, $route)
    {
//        if (access()->allow($permission)) {
            return '<a href="'.route($route, $this).'" class="list-icons-item">
                    <i class="icon-pencil7"></i>
                </a>';
//        }
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute($permission, $route)
    {
//        if (access()->allow($permission)) {
            return '<a href="'.route($route, $this).'"
                    class="list-icons-item" data-method="delete"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-trash"></i>
                </a>';
//        }
    }

    public function getSettingsButtonAttribute($permission, $route)
    {
        return '<div class="dropdown">
			<a href="table_elements.html#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
			<i class="icon-cog6"></i></a>
			<div class="dropdown-menu">
                    <a href="'.route($route, $this).'" class="dropdown-item"><i class="icon-pencil7"></i>Permissions</a>
                </div>
            </div>';
    }
}
