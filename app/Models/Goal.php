<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $table = "goals";
    protected $fillable = [
        "content",
        "user_id",
        "done",
    ];

    public function user() {
        $this->belongsTo(User::class);
    }
}
