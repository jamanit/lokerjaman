<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_job_type extends Model
{
    use HasFactory;

    protected $table = 'tb_job_types';

    protected $guarded = [];

    public $timestamps = true;

    public function vacancies()
    {
        return $this->hasMany(M_vacancy::class, 'job_type_id', 'id');
    }
}
