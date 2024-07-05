<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'email_verified_at' => now(),
               'role'=>'admin',
               'password'=> bcrypt('123456'),
               'remember_token' => Str::random(10),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'email_verified_at' => now(),
               'role'=> 'user',
               'password'=> bcrypt('123456'),
               'remember_token' => Str::random(10),
            ],
            [
               'name'=>'Superadmin',
               'email'=>'superadmin@gmail.com',
               'email_verified_at' => now(),
               'role'=>'superadmin',
               'password'=> bcrypt('123456'),
               'remember_token' => Str::random(10),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}