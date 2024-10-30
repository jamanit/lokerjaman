<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_company_type extends Model
{
    use HasFactory;

    protected $table = 'tb_company_types';

    protected $guarded = [];

    public $timestamps = true;

    public function companies()
    {
        return $this->hasMany(M_vacancy::class, 'company_type_id', 'id');
    }
}
