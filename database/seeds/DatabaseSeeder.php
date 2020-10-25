<?php

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*DB::table('users')->insert(['name' => 'Usuario',
        'email' => 'user@site.com',
        'password' => Hash::make('123456'),
        ]);
        DB::table('admins')->insert(['name' => 'Administrador',
        'email' => 'admin@site.com',
        'password' => Hash::make('123456'),
        ]);*/
        DB::table('pedidos')->insert(['users_id' => '4',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
