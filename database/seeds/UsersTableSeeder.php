<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            // [
            //     'name' => 'Sekretaris',
            //     'nim' => 'D1041151031',
            //     'email' => 'sekretaris@gmail.com',
            //     'prodi' => 'Informatika',
            //     'fakultas' => 'Teknik',
            //     'no_hp' => '094984984',
            //     'keluarga' => '7',
            //     'foto' => 'foto.jpg',
            //     'periode' => '2015',
            //     'role' => 'sekretaris',
            //     'password' => bcrypt('ssssssss'),
            // ],
            // [
            //     'name' => 'Mahasiswa',
            //     'nim' => 'D1041151032',
            //     'email' => 'mahasiswa@gmail.com',
            //     'prodi' => 'Informatika',
            //     'fakultas' => 'Teknik',
            //     'no_hp' => '094984984',
            //     'keluarga' => '7',
            //     'foto' => 'foto.jpg',
            //     'periode' => '2016',
            //     'role' => 'mahasiswa',
            //     'password' => bcrypt('mmmmmmmm'),
            // ],
            [
                'name' => 'Tutor',
                'nim' => 'D1041151033',
                'email' => 'tutor@gmail.com',
                'prodi' => 'Informatika',
                'fakultas' => 'Teknik',
                'no_hp' => '094984984',
                'keluarga' => '3',
                'foto' => 'foto.jpg',
                'periode' => '2016',
                'role' => 'tutor',
                'password' => bcrypt('tttttttt'),
            ],
        );
        // $user = [
        //     [
        //         'name' => 'Sekretaris',
        //         'nim' => 'D1041151031',
        //         'email' => 'sekretaris@gmail.com',
        //         'prodi' => 'Informatika',
        //         'fakultas' => 'Teknik',
        //         'no_hp' => '094984984',
        //         'keluarga' => '7',
        //         'foto' => 'foto.jpg',
        //         'periode' => '2015',
        //         'role' => '1',
        //         'password' => bcrypt('12345678'),
        //     ],
        //     [
        //         'name' => 'Mahasiswa',
        //         'nim' => 'D1041151032',
        //         'email' => 'mahasiswa@gmail.com',
        //         'prodi' => 'Informatika',
        //         'fakultas' => 'Teknik',
        //         'no_hp' => '094984984',
        //         'keluarga' => '7',
        //         'foto' => 'foto.jpg',
        //         'periode' => '2016',
        //         'role' => '2',
        //         'password' => bcrypt('12345678'),
        //     ],
        //     [
        //         'name' => 'Tutor',
        //         'nim' => 'D1041151033',
        //         'email' => 'tutor@gmail.com',
        //         'prodi' => 'Informatika',
        //         'fakultas' => 'Teknik',
        //         'no_hp' => '094984984',
        //         'keluarga' => '3',
        //         'foto' => 'foto.jpg',
        //         'periode' => '2016',
        //         'role' => '2',
        //         'password' => bcrypt('12345678'),
        //     ],
        // ];

        // foreach ($user as $key => $value) {
        //     Mahasiswa::create($value);
        // }


        // App\User::create([
        //     'name' => 'Beni',
        //     'email' => 'beni07if@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'role_id' => 1
        // ]);

        // App\User::create([
        //     'name' => 'Yogi',
        //     'email' => 'yogi@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'role_id' => 2
        // ]);

        // App\User::create([
        //     'name' => 'Adi',
        //     'email' => 'adi@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'role_id' => 3
        // ]);
    }
}
