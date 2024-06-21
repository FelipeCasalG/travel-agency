<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Airline extends Model
{
    protected $guarded = ['id'];

    /**
     * @return BelongsToMany<City>
     */
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class);
    }
}
