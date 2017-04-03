<?php

namespace App;

use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Blog
 * @package App
 */
class Blog extends Model
{
    use HasTags;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "blogs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'title', 'photo', 'description', 'body', 'visible'];
}
