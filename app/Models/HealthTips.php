<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HealthTips extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'url',
        'description',
        'content',
        'source',
        'health_category_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'health_tips';

    public function healthCategory()
    {
        return $this->belongsTo(HealthCategory::class);
    }
}
