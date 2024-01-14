<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function leadDeveloper():HasOne
    {
        return $this->hasOne(LeadDeveloper::class ,'id', 'lead_developer_id');
    }

    public function developers():BelongsToMany
    {
        return $this->belongsToMany(Developer::class);
    }
}
