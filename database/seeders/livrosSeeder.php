<?php

namespace Database\Seeders;

use App\Models\livros;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class livrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        for ($i = 0; $i < 100; $i++) {
            livros::create([
                'titulo' => 'titulo '. $i,
                'autor' => 'autor'.$i,
                'data_de_lancamento' => '2018-04-26',
                'editora' => 'editora'.$i,
                'sinopse' => 'sinopse '.$i,
                'genero' => 'genero' . $i,
                'avaliacao' => 'avaliacao'.$i,
             
    
            ]);
        }
    }
}