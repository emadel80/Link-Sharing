<?php

use Carbon\Carbon;
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
        DB::table('users')->insert([
            'name' => 'Geralt of Rivia',
            'email' => 'geralt.of.rivia@gmail.com',
            'password' => bcrypt('whitewolf'),
            'trusted' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Yennefer of Vengerberg',
            'email' => 'yennefer.of.vengerberg@gmail.com',
            'password' => bcrypt('horsewomanofwar'),
            'trusted' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Cirilla Fiona Elen Riannon',
            'email' => 'ciri.riannon@gmail.com',
            'password' => bcrypt('ladyofspaceandtime'),
            'trusted' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Triss Merigold',
            'email' => 'triss.merigold@gmail.com',
            'password' => bcrypt('merigoldthefearless'),
            'trusted' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Fringilla Vigo',
            'email' => 'fringilla.vigo@gmail.com',
            'password' => bcrypt('sorceress'),
            'trusted' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
