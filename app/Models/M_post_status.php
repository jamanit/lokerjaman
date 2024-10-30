<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_post_status extends Model
{
    use HasFactory;

    protected $table = 'tb_post_status';

    protected $guarded = [];

    public $timestamps = true;

    public function vacancies()
    {
        return $this->hasMany(M_vacancy::class, 'post_status_id', 'id');
    }
}
