<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FaqCategory
 * @package App
 */
class FaqCategory extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function faqs()
    {
        return $this->belongsToMany('App\Faq');
    }
}
