<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChildMedicalData extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'child_id',
        'weight',
        'height',
        'remarks',
        'checkup_followup',
        'bmi',
        'diagnosis',
        'rhuBhw_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'child_medical_data';

    protected $casts = [
        'checkup_followup' => 'date',
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    public function rhuBhw()
    {
        return $this->belongsTo(RhuBhw::class, 'rhuBhw_id');
    }
}
