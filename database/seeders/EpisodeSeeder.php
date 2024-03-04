<?php

namespace Database\Seeders;

use App\Models\Episode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Episode::create([
            "titolo" => "Episodio 1",
            "ordine" => "1",
            "durata" => "47",
            "copertina" => "url all'immagine di copertina del film",
            "descrizione" => "Provenienti da realtà opposte, Filippo e Carmine si ritrovano a condividere la stessa cella in un istituto di pena minorile di Napoli per scontare due pesanti accuse.",
            "season_id" => 1,
        ]);
        Episode::create([
            "titolo" => "Episodio 2",
            "ordine" => "2",
            "durata" => "58",
            "copertina" => "url all'immagine di copertina del film",
            "descrizione" => "Mentre Carmine conosce le regole del carcere, Filippo è un pesce fuor d'acqua ed è preso di mira dagli altri detenuti. Il comandante Massimo decide di non intervenire.",
            "season_id" => 1,
        ]);
    }
}
