<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HealthCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['cat_name'];

    protected $searchableFields = ['*'];

    protected $table = 'health_categories';

    public function allHealthTips()
    {
        return $this->hasMany(HealthTips::class);
    }
}
