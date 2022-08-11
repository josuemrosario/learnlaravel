<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(FornecedorSeeder::class);
        //aula 118 seeder 2
        $this->call(SiteContatoSeeder::class);
        //aula 127 refactoring do projeto parte 1
        $this->call(MotivosContatoSeeder::class);
    }
}
