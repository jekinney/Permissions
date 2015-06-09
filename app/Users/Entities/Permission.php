<?php namespace App\Users\Entities;

use App\Users\Traits\PermissionsTraits;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model {
    use PermissionsTraits;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'name', 'description'];
}
