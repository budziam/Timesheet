<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ProjectSeeder::class);
        $this->call(UserSeeder::class);
    }
}
