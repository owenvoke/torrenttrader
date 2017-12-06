<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class UserTeam.
 */
class UserTeam extends Pivot
{
    /**
     * @var string
     */
    protected $table = 'user_teams';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
