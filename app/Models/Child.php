<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Child extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'completename',
        'photo',
        'dob',
        'gender',
        'mothersName',
        'address',
        'phone',
        'username',
        'password'
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'dob' => 'date',
    ];

    public function childCheckUpInfos()
    {
        return $this->hasMany(ChildMedicalData::class, 'child_id');
    }
}
