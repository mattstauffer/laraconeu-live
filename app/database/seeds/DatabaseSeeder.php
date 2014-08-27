<?php

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('UserSeeder');
        $this->call('MessageSeeder');

        $this->command->info('Message table seeded!');
    }
}
