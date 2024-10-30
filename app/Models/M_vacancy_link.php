<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;
use App\Traits\InsertUserId;

class M_vacancy_link extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_vacancy_links';

    protected $guarded = [];

    public $timestamps = true;

    public function vacancy()
    {
        return $this->belongsTo(M_vacancy::class, 'vacancy_id', 'id');
    }
}
