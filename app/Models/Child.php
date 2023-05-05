<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Child extends Authenticatable
{
    
    use HasFactory;
    use Searchable;
    use Notifiable;

    protected $guarded = [];

     public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

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
