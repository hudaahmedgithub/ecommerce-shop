<?php

namespace App\Filters\Property;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CommentFilter extends Model
{
    /**
     * Set the CommentFilter's comment
     *
     * @param  string $value
     * @return string
     */
    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = sanitizeString($value)[0];
    }

    public function getCreatedAtAttribute($value)
    {
        $carbon = new Carbon($value);

        return $carbon->diffForHumans();
    }
}
