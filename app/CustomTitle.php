<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomTitle
 * @package App
 */
class CustomTitle extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
