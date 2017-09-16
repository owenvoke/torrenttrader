<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Faq
 * @package App
 */
class Faq extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categories()
    {
        return $this->hasOne('App\FaqCategory');
    }
}
