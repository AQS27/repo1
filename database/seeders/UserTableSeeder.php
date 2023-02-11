<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),// password
            'dni' => '49407418z',
            'direccion' => 'Las Palmas',
            'telefono' => '639448726',
            'rol' => 'admin',

        ]);

        User::factory()
            ->count(20)
            ->create();
    }
}
