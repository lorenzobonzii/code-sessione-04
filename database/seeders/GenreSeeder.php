<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create(["nome" => "Drammatico"]);
        Genre::create(["nome" => "Avventura"]);
        Genre::create(["nome" => "Azione"]);
        Genre::create(["nome" => "Horror"]);
        Genre::create(["nome" => "Thriller"]);
        Genre::create(["nome" => "Sitcom"]);
        Genre::create(["nome" => "Romantico"]);
    }
}
