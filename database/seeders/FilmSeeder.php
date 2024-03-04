<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::create([
            "titolo" => "Titanic",
            "regia" => "James Cameron",
            "anno" => "1997",
            "durata" => "195",
            "lingua" => "inglese",
            "copertina" => "url all'immagine di copertina del film",
            "anteprima" => "url al video di anteprima del film",
            "trama" => "È il film per eccellenza narrante la tragica storia dell'affondamento del più grande transatlantico del mondo, a quel tempo. Il Titanic, considerato inaffondabile, aveva cabite per tre classi sociali diverse, sale da pranzo e da ballo, ristoranti e i comfort più lussuosi. È proprio tra questi che la giovane e aristocratica Rose incontra il semplice ma affascinante Jack, passeggero di terza classe con il quale stringerà un legame talmente profondo da sopravvivere anche nella tragedia di quella notte in cui il Titanic affondò.",
            "nation_id" => 234,
        ]);
        Film::create([
            "titolo" => "Avengers: Infinity War",
            "regia" => "Anthony & Joe Russo",
            "anno" => "2018",
            "durata" => "149",
            "lingua" => "inglese",
            "copertina" => "url all'immagine di copertina del film",
            "anteprima" => "url al video di anteprima del film",
            "trama" => "La nave spaziale di Thanos è in rotta verso la Terra. ll tiranno si imbatte nell'astronave che trasportava Thor e gli altri superstiti asgardiani, e uccide Loki a mani nude. Il dio del tuono viene salvato, disperso nello spazio, dai guardiani della galassia, che decidono di aiutarlo nella sua missione per sconfiggere Thanos. Nel frattempo sul nostro pianeta Tony Stark viene avvisato da Stephen Strange del pericolo prossimo ad arrivare e dopo un breve scontro nelle strade cittadine, i supereroi (coadiuvati dall'Uomo Ragno) si mettono all'inseguimento dell'astronave finendo loro stessi nello spazio. Anche Captain America e gli altri Avengers si stanno organizzando per affrontare l'incombente minaccia, ma scopriranno ben presto di avere a che fare con un avversario dai poteri devastanti.",
            "nation_id" => 234,
        ]);
        $films=Film::all();
        foreach($films as $film){
            $film->genres()->attach(rand(1,6));
            $film->genres()->attach(rand(1,6));
        }
    }
}
