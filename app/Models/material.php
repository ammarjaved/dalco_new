<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    protected $table = 'material1';
    protected $fillable = ['mat_code','mat_type', 'mat_desc', 'bun'];

}
