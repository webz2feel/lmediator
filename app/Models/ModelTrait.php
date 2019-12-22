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
            return '<a href="'.route($route, $this).'" class="btn btn-primary btn-sm btn-icon">
                    <i class="icon-database-edit2"></i>
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
                    class="btn btn-danger btn-sm btn-icon delete-btn" data-method="delete"
                    data-trans-button-cancel="'.trans('buttons.general.cancel').'"
                    data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
                    data-trans-title="'.trans('strings.backend.general.are_you_sure').'">
                       <i class="icon-trash-alt"></i>
                </a>';
//        }
    }
}
