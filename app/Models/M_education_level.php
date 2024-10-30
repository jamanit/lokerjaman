<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_education_level extends Model
{
    use HasFactory;

    protected $table = 'tb_education_levels';

    protected $guarded = [];

    public $timestamps = true;

    public function vacancies()
    {
        return $this->hasMany(M_vacancy::class, 'education_level_id', 'id');
    }
}
