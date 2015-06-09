<?php namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users\Repositories\Eloquent\EloquentGroup;
use App\Users\Repositories\Eloquent\EloquentPermission;

class GroupController extends Controller {

    private $groupRepository;

    function __construct(EloquentGroup $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function all(EloquentPermission $permissions)
    {
        $groups = $this->groupRepository->allWithPermissions();
        $permissions = $permissions->all();
        return view('backend.group.all', compact('groups', 'permissions'));
    }

    public function update($id, Request $request)
    {
        $this->groupRepository->update($id, $request->all());
        return back();
    }

    public function store(Request $request)
    {
        $this->groupRepository->create($request->all());
        return back();
    }

    public function delete($id)
    {
        $this->groupRepository->delete($id);
        return back();
    }
}
