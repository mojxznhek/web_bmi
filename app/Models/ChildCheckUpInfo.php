<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChildCheckUpInfo extends Model
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
        'bario_physician_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'child_check_up_infos';

    protected $casts = [
        'checkup_followup' => 'date',
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }

    public function barioPhysician()
    {
        return $this->belongsTo(BarioPhysician::class);
    }
}
