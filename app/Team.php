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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_teams');
    }
}
