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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faqs()
    {
        return $this->hasMany('App\Faq', 'category_id');
    }
}
