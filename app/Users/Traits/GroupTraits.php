<?php namespace App\Users\Traits;

trait GroupTraits {
    /**
     * Relationship to User Model(many to many)
     *
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany('App\Users\Entities\User');
    }
    /**
     *  Relationship to Permission Model(many to many)
     *
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Users\Entities\Permission');
    }
    /**
     * Save the inputted permissions.
     *
     * @param mixed $permissions
     *
     * @return void
     */
    public function savePermissions($permissions)
    {
        if (!empty($permissions)) {
            $this->permissions()->sync($permissions);
        } else {
            $this->permissions()->detach();
        }
    }
}