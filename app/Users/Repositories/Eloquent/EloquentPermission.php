<?php namespace App\Users\Repositories\Eloquent;

use App\Users\Entities\Permission;

class EloquentPermission {

    private $permission;

    function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function all()
    {
        $permissions = $this->permission->all();
        return $permissions;
    }

    public function add(array $input)
    {
        $permission = $this->permission->create($input);
        return $permission;
    }

    public function update($input)
    {
        $permission = $this->findbySlug($input->id);
        $permission->update($input->all());
        return $permission;
    }
}