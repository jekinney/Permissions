<?php namespace App\Users\Repositories\Eloquent;

class EloquentMangeUser extends EloquentUser {

    public function all($limit = 20)
    {
        $users = $this->user->paginate($limit);
        return $users;
    }

    public function updateByAdmin($input)
    {
        $user = $this->user->find($input->id);
        // check for checkbox to ban\unban and\or activate\deactivate a user
        if($input->banned) {
            $this->banUser($user);
        } elseif($user->banned == 1) {
            $this->unBanUser($user);
        }
        if($user->activated == 1 and !$input->activated) {
            $this->deactivateUser($user);
        } elseif($user->activated == 0 and $input->activated) {
            $this->activateUser($user);
        }
        if($input->group) {
            if($user->groups->count() > 0) {
                $user->detachGroup();
            }
            $user->attachGroup($input->group);
        }
        return $user;
    }
    private function activateUser($user)
    {
        $user->activated = 1;
        $user->save();
    }

    private function deActivateUser($user)
    {
        $user->activated = 0;
        $user->save();
    }

    private function banUser($user)
    {
        $user->banned = 1;
        $user->save();
    }

    private function unBanUser($user)
    {
        $user->banned = 0;
        $user->save();
    }
}