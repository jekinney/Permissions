<?php namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users\Repositories\Eloquent\EloquentGroup;
use App\Users\Repositories\Eloquent\EloquentMangeUser;

class ManageUserController extends Controller {
    private $userRepository;

    function __construct(EloquentMangeUser $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        $users = $this->userRepository->allPaginated();
        return view('backend.user.all', compact('users'));
    }

    public function edit($username, EloquentGroup $group)
    {
        $user = $this->userRepository->findByUsername($username);
        $groups = $group->all();
        return view('backend.user.edit', compact('user', 'groups'));
    }

    public function update(Request $request)
    {
        $user = $this->userRepository->updateByAdmin($request);
        return back();
    }

}
