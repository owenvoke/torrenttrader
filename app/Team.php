<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * @package App
 */
class Team extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
