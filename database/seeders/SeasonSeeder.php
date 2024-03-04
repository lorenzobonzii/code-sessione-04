<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Season::create([
            "titolo" => "Stagione 1",
            "ordine" => "1",
            "anno" => "2020",
            "trama" => "Carmine e Filippo esplorano l'amicizia, l'amore e i sogni di un futuro migliore in un carcere minorile napoletano a picco sul mare.",
            "serie_id" => 1,
        ]);
    }
}
