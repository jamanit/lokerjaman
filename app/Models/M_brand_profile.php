<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_brand_profile extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_brand_profiles';

    protected $guarded = [];

    public $timestamps = true;
}
