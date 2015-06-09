<?php namespace App\Users\Repositories\Eloquent;

use App\Users\Entities\User;
use App\Users\Repositories\Interfaces\UserInterface;

class EloquentUser implements UserInterface{

    protected $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function allPaginated($limit = 20)
    {
        $users = $this->user->paginate($limit);
        return $users;
    }

    public function findByUsername($username)
    {
        return $this->user->where('username', $username)->first();
    }
}