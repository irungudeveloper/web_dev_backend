<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = "salary";

    protected $fillable = ['profession','salary','gender','contact','project'];

    public $timestamps = false;
}
