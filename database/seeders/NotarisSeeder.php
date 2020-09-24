<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NotarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notaris')->insert([
            'nama_notaris' => 'Amri Karisma',
            'email' => 'amrikarisma@yahoo.com',
            'tempat_lahir' => 'Sleman',
            'tanggal_lahir' => '1993-06-20',
            'jenis_kelamin_notaris' => 'Laki-Laki',
            'npwp_notaris' => '019239129312931239',
            'notaris_ttd' => '1.jpg',
        ]);
    }
}
