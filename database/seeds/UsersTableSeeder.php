<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    private $users = [
        [
            'name' => 'Administrador',
            'email' => 'admin@admin.com.br',
            'password' => "123456",
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->users as $user){
            $user['password'] = bcrypt($user['password']);
            User::create($user);
        }
    }
}
