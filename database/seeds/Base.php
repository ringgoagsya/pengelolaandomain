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
            'alamat_domain'=>'fti.unand.ac.id',
        ],
        [   'id'=>'2',
            'nama_unit'=>'Fakultas Teknik',
            'alamat_domain'=>'ft.unand.ac.id',
        ],  
        [   'id'=>'3',
            'nama_unit'=>'Fakultas Peternakan',
            'alamat_domain'=>'faterna.unand.ac.id',
        ],  
        [   'id'=>'4',
            'nama_unit'=>'Fakultas Pertanian',
            'alamat_domain'=>'faperta.unand.ac.id',
        ],  
        [   'id'=>'5',
            'nama_unit'=>'Fakultas Farmasi',
            'alamat_domain'=>'ffarmasi.unand.ac.id',
        ],  
        [   'id'=>'6',
            'nama_unit'=>'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'alamat_domain'=>'fmipa.unand.ac.id',
        ],  
        [   'id'=>'7',
            'nama_unit'=>'Fakultas Teknologi Pertanian',
            'alamat_domain'=>'ftp.unand.ac.id',
        ],  
        [   'id'=>'8',
            'nama_unit'=>'Pasca Sarjana',
            'alamat_domain'=>'pasca.unand.ac.id',
        ],  
        [   'id'=>'9',
            'nama_unit'=>'Fakultas Keperawatan',
            'alamat_domain'=>'fkep.unand.ac.id',
        ],  
        [   'id'=>'10',
            'nama_unit'=>'Fakultas Kedokteran',
            'alamat_domain'=>'fk.unand.ac.id',
        ],  
        [   'id'=>'11',
            'nama_unit'=>'Fakultas Kesehatan Masyarakat',
            'alamat_domain'=>'fkm.unand.ac.id',
        ],  
        [   'id'=>'12',
            'nama_unit'=>'Fakultas Kedokteran Gigi',
            'alamat_domain'=>'fkg.unand.ac.id',
        ],  
        [   'id'=>'13',
            'nama_unit'=>'Fakultas Hukum',
            'alamat_domain'=>'fhuk.unand.ac.id',
        ],  
        [   'id'=>'14',
            'nama_unit'=>'Fakultas Ekonomi',
            'alamat_domain'=>'fekon.unand.ac.id',
        ],  
        [   'id'=>'15',
            'nama_unit'=>'Fakultas Ilmu Budaya',
            'alamat_domain'=>'fib.unand.ac.id',
        ],  
        [   'id'=>'16',
            'nama_unit'=>'Fakultas Ilmu Sosial dan Politik',
            'alamat_domain'=>'fisip.unand.ac.id',
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
