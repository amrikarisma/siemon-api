<?php

namespace App\Models\Kenotariatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaris extends Model
{
    use HasFactory;
    protected $table = 'notaris';

    protected $fillable = [
        'nama_notaris', 'no_telepon_notaris'
    ];
}
