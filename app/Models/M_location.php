<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;
use App\Traits\InsertUserId;

class M_location extends Model
{
    use HasFactory, GeneratesUuid, InsertUserId;

    protected $table = 'tb_locations';

    protected $guarded = [];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function vacancies()
    {
        return $this->hasMany(M_vacancy::class, 'location_id', 'id');
    }
}
