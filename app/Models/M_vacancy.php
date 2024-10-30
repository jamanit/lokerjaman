<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;
use App\Traits\InsertUserId;

class M_vacancy extends Model
{
    use HasFactory, GeneratesUuid, InsertUserId;

    protected $table = 'tb_vacancies';

    protected $guarded = [];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(M_company::class, 'company_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(M_location::class, 'location_id', 'id');
    }

    public function education_level()
    {
        return $this->belongsTo(M_education_level::class, 'education_level_id', 'id');
    }

    public function job_type()
    {
        return $this->belongsTo(M_job_type::class, 'job_type_id', 'id');
    }

    public function post_status()
    {
        return $this->belongsTo(M_post_status::class, 'post_status_id', 'id');
    }

    public function vacancy_links()
    {
        return $this->hasMany(M_vacancy_link::class, 'vacancy_id', 'id');
    }
}
