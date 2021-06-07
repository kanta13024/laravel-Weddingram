<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_names = [
            '佐藤健太', '佐藤颯', '河田瀬里奈',
        ];

        $num = 0;

        foreach ($user_names as $user_name) {
            $num++;
            User::create([
                'name' => $user_name,
                'icon' => 'dummy.png',
                'email' => 'sample@sample' . $num . 'com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
