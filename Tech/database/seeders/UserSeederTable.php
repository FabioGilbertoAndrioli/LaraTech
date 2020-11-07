<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fábio Gilberto A. Goncalves',
            'email' => 'fabio.drioli@gmail.com',
            'password' => bycript('12345678'),
        ]);

        User::create([
            'name' => 'Ana Clara Soriani',
            'email' => 'ana.clara@gmail.com',
            'password' => bycript('12345678'),
        ]);

        User::create([
            'name' => 'Larissa Soriani Barreto',
            'email' => 'larissa.soriani@gmail.com',
            'password' => bycript('12345678'),
        ]);
    }
}
