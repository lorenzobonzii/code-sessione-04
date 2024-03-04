<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "id" => 1,
            "role_id" => 1,
            "nome" => "Lorenzo",
            "cognome" => "Bonzi",
            "sesso" => 1,
            "cf" => "BNZLNZ04M13A944B",
            "indirizzo" => "Via Adige 12",
            "nation_id" => 1,
            "municipality_id" => 4304,
            "email" => "lorenzobonzi04@gmail.com",
            "telefono" => "+393348334248",
            "user" => "lorenzobonzii",
            "password" => sha1("Lollo2023!"),
            "stato" => 1
        ]);
    }
}
