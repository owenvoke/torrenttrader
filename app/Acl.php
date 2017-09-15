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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
