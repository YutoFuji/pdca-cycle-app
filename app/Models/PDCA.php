<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDCA extends Model
{
    use HasFactory;

    protected $table = "p_d_c_a_s";
    protected $fillable = [
        "content",
        "pdca_elem",
        "user_id",
        "goal_id",
    ];
} 
