<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\SalarioSeeder;
use Database\Seeders\CategoriasSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call( SalarioSeeder::class );
       $this->call( CategoriasSeeder::class );
    }
}
