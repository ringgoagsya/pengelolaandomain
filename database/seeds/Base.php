<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Base extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
        [   'id'=>'1',
            'nama_unit'=>'Fakultas Teknologi Informasi',
        ],
        [   'id'=>'2',
            'nama_unit'=>'Fakultas Teknik',
        ],  
        [   'id'=>'3',
            'nama_unit'=>'Fakultas Peternakan',
        ],  
        [   'id'=>'4',
            'nama_unit'=>'Fakultas Pertanian',
        ],  
        [   'id'=>'5',
            'nama_unit'=>'Fakultas Farmasi',
        ],  
        [   'id'=>'6',
            'nama_unit'=>'Fakultas Matematika dan Ilmu Pengetahuan Alam',
        ],  
        [   'id'=>'7',
            'nama_unit'=>'Fakultas Pertanian',
        ],  
        [   'id'=>'8',
            'nama_unit'=>'Fakultas Teknik',
        ],  
        [   'id'=>'9',
            'nama_unit'=>'Fakultas Keperawatan',
        ],  
        [   'id'=>'10',
            'nama_unit'=>'Fakultas Kedokteran',
        ],  
        [   'id'=>'11',
            'nama_unit'=>'Fakultas Kesehatan Masyarakat',
        ],  
        [   'id'=>'12',
            'nama_unit'=>'Fakultas Kedokteran Gigi',
        ],  
        [   'id'=>'13',
            'nama_unit'=>'Fakultas Hukum',
        ],  
        [   'id'=>'14',
            'nama_unit'=>'Fakultas Ekonomi',
        ],  
        [   'id'=>'15',
            'nama_unit'=>'Fakultas Ilmu Budaya',
        ],  
        [   'id'=>'16',
            'nama_unit'=>'Fakultas Ilmu Sosial dan Politik',
        ] 
            
        ]);
        DB::table('platforms')->insert([
            [
                'id'=>'1',
                'nama_platform'=> 'Wordpress',
            ],
            [
                'id'=>'2',
                'nama_platform'=>'CMS',
            ],
            [
                'id'=>'3',
                'nama_platform'=>'Webmin',
            ],
        ]);
        DB::table('pengelolas')->insert([
            [
                'id'=>'1',
                'name'=>'Ringgo',
                'penanggung_jawab'=>'Pak Husnil',
                'id_unit'=>'1',
                'telp'=>'081358805163',
                'email'=>'ringgoagsya12@gmail.com',
                'password'=>'12345678',
            ],
            [
                'id'=>'2',
                'name'=>'Afi',
                'penanggung_jawab'=>'Pak Wahyudi',
                'id_unit'=>'1',
                'telp'=>'081358805163',
                'email'=>'nurulafifah14@gmail.com',
                'password'=>'12345678',
            ],
            [
                'id'=>'3',
                'name'=>'Puty',
                'penanggung_jawab'=>'Pak Ijab',
                'id_unit'=>'1',
                'telp'=>'081358805163',
                'email'=>'puty@gmail.com',
                'password'=>'12345678',
            ],
            [
                'id'=>'4',
                'name'=>'Sabrina',
                'penanggung_jawab'=>'Pak Surya',
                'id_unit'=>'1',
                'telp'=>'081358805163',
                'email'=>'sabrinapratama@gmail.com',
                'password'=>'12345678',
            ],
        ]);
        DB::table('admins')->insert([
            [
                'id'=>'1',
                'name'=>'admin',
                'no_identitas'=>'1811522023',
                'email'=>'admin2023@gmail.com',
                'password'=>'12345678',
            ],
            [
                'id'=>'2',
                'name'=>'admin2',
                'no_identitas'=>'1811522020',
                'email'=>'admin2020@gmail.com',
                'password'=>'12345678',
            ],
            [
                'id'=>'3',
                'name'=>'admin3',
                'no_identitas'=>'1811522012',
                'email'=>'admin2012@gmail.com',
                'password'=>'12345678',
            ],
            [
                'id'=>'4',
                'name'=>'admin4',
                'no_identitas'=>'1811522013',
                'email'=>'admin2013@gmail.com',
                'password'=>'12345678',
            ],
        ]);
    }
}
