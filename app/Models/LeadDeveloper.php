<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadDeveloper extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'leadDevelopers';
    protected $fillable=['name','email'];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}

