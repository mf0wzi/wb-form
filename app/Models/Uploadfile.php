<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadfile extends Model
{
    use HasFactory;

    protected $table = 'upload_files';

    protected $fillable = [
        'uuid',
        'user_id',
        'file',
        'filename',
        'extension',
        'file_path',
    ];
}
