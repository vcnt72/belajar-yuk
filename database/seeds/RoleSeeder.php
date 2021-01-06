<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::insert(array(
            array(
                'name' => 'user'
            ),
            array(
                'name' => 'admin'
            )
        ));
    }
}
