<?php

namespace App\Models\Kenotariatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_laporan_bulanan';

    public function laporan()
    {
        return $this->hasMany('App\Models\Kenotariatan\Laporan');
    }
}
