<?php namespace App\Events\Users;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserWasRegistered implements ShouldQueue {
    use SerializesModels;
    /**
     * @var Object $user
     */
    public $user;
    /**
     * Create a new event instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}
