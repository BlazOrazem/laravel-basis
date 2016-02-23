<?php

namespace Admin\Traits;

use Admin\Models\Role;

trait ManagerRoles
{
    /**
     * Return the entity's roles.
     *
     * @return object
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Assign a role to the entity.
     *
     * @param $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::where($role)->firstOrFail()
        );
    }

    /**
     * Determine if the entity has a given role.
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !!$role->intersect($this->roles)->count();
    }
}
