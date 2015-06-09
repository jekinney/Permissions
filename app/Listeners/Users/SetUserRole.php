<?php namespace App\Listeners\Users;

use App\Events\Users\NewUserWasRegistered;
use App\Users\Repositories\Eloquent\EloquentGroup;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetUserRole implements ShouldQueue {
    use InteractsWithQueue;
    private $group;
    /**
     * Create the event listener.
     *
     * @param EloquentGroup $group
     */
    public function __construct(EloquentGroup $group)
    {
        $this->group = $group;
    }
    /**
     * Handle the event.
     *
     * @param  NewUserWasRegistered  $event
     * @return void
     */
    public function handle(NewUserWasRegistered $event)
    {
        $group = $this->group->assignDefault();
        $event->user->group()->attach($group->id);
        if(!is_null($group->permissions)) {
            $event->user->permissions()->sync($group->permissions());
        }
    }
}
