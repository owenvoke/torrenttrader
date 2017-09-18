<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Acl
 * @package App
 */
class Acl extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
