<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Termwind\ValueObjects\p;

class FlatImageModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'file',
        'resize'
    ];
}
