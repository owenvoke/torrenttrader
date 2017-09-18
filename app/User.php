<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function torrents()
    {
        return $this->hasMany('App\Torrent');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function acl()
    {
        return $this->hasOne('App\Acl');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function custom_title()
    {
        return $this->hasOne('App\CustomTitle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany('App\Team', 'user_teams');
    }
}
