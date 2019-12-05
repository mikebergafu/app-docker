<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'title',
        'description',
        'category_id',
    ];

    /**
     * Get the Account that owns the payments.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
