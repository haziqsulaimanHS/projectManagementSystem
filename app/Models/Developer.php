<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Developer extends Model
{
    use HasFactory;
    use SoftDeletes;

    //should be BelongsToMany
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
