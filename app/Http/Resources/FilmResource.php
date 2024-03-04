<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            "titolo" => $this->titolo,
            "regia" => $this->regia,
            "anno" => $this->anno,
            "durata" => $this->durata,
            "lingua" => $this->lingua,
            "copertina" => $this->copertina,
            "anteprima" => $this->anteprima,
            "trama" => $this->trama,
            //"nation_id" => $this->nation_id,
            "nation" => $this->nation,
            "genres" => $this->genres,
        ];
    }
}
