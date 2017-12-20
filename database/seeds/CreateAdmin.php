<?php

use Illuminate\Database\Seeder;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'surname'=>'ADMIN',
            'email'=>'admin@bilim.kz',
            'password'=>bcrypt('adminqwerty'),
            'isAdmin'=>1

        ]);
    }
}
