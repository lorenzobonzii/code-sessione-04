<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return $this->getCampi();
    }

    protected function getCampi(){
        return [
            "id" => $this->id,
            "role_id" => $this->role_id,
            "nome" => $this->nome,
            "cognome" => $this->cognome,
            "sesso" => $this->sesso,
            "cf" => $this->cf,
            "indirizzo" => $this->indirizzo,
            "nation_id" => $this->nation_id,
            "municipality_id" => $this->municipality_id,
            "email" => $this->email,
            "telefono" => $this->telefono,
            "user" => $this->user,
            "stato" => $this->stato
        ];
    }
}
