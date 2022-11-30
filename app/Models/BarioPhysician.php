<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarioPhysician extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['completename', 'profession', 'license_no'];

    protected $searchableFields = ['*'];

    protected $table = 'bario_physicians';

    public function childCheckUpInfos()
    {
        return $this->hasMany(ChildCheckUpInfo::class);
    }
}
