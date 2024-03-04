<?php

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Serie::create([
            "titolo" => "La casa de papel",
            "regia" => "Álex Pina",
            "anno" => "2017",
            "lingua" => "spagnolo",
            "copertina" => "url all'immagine di copertina del film",
            "anteprima" => "url al video di anteprima del film",
            "trama" => "Otto ladri si barricano nell'edificio della Zecca spagnola con alcuni ostaggi, mentre una mente criminale manipola la polizia per mettere in atto il suo piano.",
            "nation_id" => 68,
        ]);
        Serie::create([
            "titolo" => "How I Met Your Mother",
            "regia" => "Carter Bays, Craig Thomas",
            "anno" => "2005",
            "lingua" => "inglese",
            "copertina" => "url all'immagine di copertina del film",
            "anteprima" => "url al video di anteprima del film",
            "trama" => "Ted Mosby, il quale si trova venticinque anni nel futuro, racconta ai figli gli eventi che l’hanno portato a incontrare la loro madre. Tutto inizia quando il migliore amico di Ted, Marshall, dice di aver intenzione di chiedere la mano alla ragazza cui è legato da moltissimo tempo, Lily, un'insegnate d'asilo. In quel momento Ted comprende che è arrivato il momento per lui di darsi una mossa e trovare anch'esso il vero amore.",
            "nation_id" => 234,
        ]);
        $series=Serie::all();
        foreach($series as $serie){
            $serie->genres()->attach(rand(1,6));
            $serie->genres()->attach(rand(1,6));
        }
    }
}
