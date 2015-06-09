<?php namespace App\Users\Traits;

trait UserGroupsTrait {
    /**
     * Loop through a user group permissions to see if we have a match
     *
     * @param $slug
     * @param bool $requireAll
     * @return bool
     */
    public function hasPermission($slug, $requireAll = false)
    {
        if (is_array($slug)) {
            foreach ($slug as $name) {
                $hasPerm = $this->hasPermission($name);
                if ($hasPerm && !$requireAll) return true;
                elseif (!$hasPerm && $requireAll) return false;
            }
            // If we've made it this far and $requireAll is FALSE, then NONE of the perms were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the perms were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            foreach ($this->groups as $group) {
                // Validate against the Permission table
                foreach ($group->permsission as $perm) {
                    if ($perm->name == $slug) return true;
                }
            }
        }
        return false;
    }
    /**
     * Loop through a user's roles to see if we have match
     *
     * @param $slug
     * @return bool
     */
    public function hasGroup($slug)
    {
        if(is_array($slug))
        {
            foreach($slug as $name) {
                $hasGroup = $this->hasGroup($name);
                if($hasGroup) return true;
            }
        } else {
            foreach ($this->groups as $group) {
                if ($group->slug == $slug) return true;
            }
        }
        return false;
    }
    /**
     * Detach a group from the user
     *
     * @param $group
     */
    public function detachGroup()
    {
        $this->groups()->detach();
    }
    /**
     * attach a group to the user
     *
     * @param $group
     */
    public function attachGroup($group)
    {
        if(is_object($group)) {
            $group = $group->getKey();
        }
        if(is_array($group)) {
            $group = $group['id'];
        }
        $this->groups()->attach($group);
    }
}