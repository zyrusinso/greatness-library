<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorLogs extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'visitor_logs';
}
