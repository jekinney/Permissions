<?php namespace App\Users\Entities;

use App\Users\Traits\GroupTraits;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {
    use GroupTraits;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'name', 'description'];
}
