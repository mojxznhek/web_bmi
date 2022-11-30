<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RhuBhw extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['completename', 'profession', 'license_no'];

    protected $searchableFields = ['*'];

    protected $table = 'rhu_bhws';

    public function childCheckUpInfos()
    {
        return $this->hasMany(ChildMedicalData::class, 'rhuBhw_id');
    }
}
