<?php namespace App\Users\Repositories\Eloquent;

use App\Users\Entities\Group;

class EloquentGroup {

    private $group;


    function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function all()
    {
        $groups = $this->group->all();
        return $groups;
    }

    public function allWithPermissions()
    {
        $groups = $this->group->with('permissions')->get();
        return $groups;
    }

    public function findBySlug($slug)
    {
        $group = $this->group->where('slug', $slug)->first();
        return $group;
    }

    public function findBySlugWithPermissions($slug)
    {
        $group = $this->group->with('permissions')->where('slug', $slug)->first();
        return $group;
    }

    public function add(array $input)
    {
        $group = $this->group->create($input);
        return $group;
    }

    public function assignDefault()
    {
        $group = $this->with('permissions')->findBySlug('member');
        return $group;
    }

    public function update($groupID, array $input)
    {
        $permissions = [];
        if(isset($input['permissions'])) $permissions = $input['permissions'];
        $group = $this->group->find($groupID);
        $group->update($input);
        $group->savePermissions($permissions);
    }

    public function create(array $input)
    {
        $permissions = [];
        if(isset($input['permissions'])) $permissions = $input['permissions'];
        $group = $this->group->create($input);
        $group->savePermissions($permissions);
    }

    public function delete($id)
    {
        $group = $this->group->find($id);
        $group->delete();
    }
}