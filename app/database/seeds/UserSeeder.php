<?php

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'foo@example.com',
            'password' => 'password',
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);
    }
}
