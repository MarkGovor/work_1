<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookMark extends Model
{
    use HasFactory;

    protected $fillable = ['favicon', 'url', 'title', 'meta_keywords', 'meta_description'];
}
