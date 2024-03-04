<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IVACalculate extends Controller
{
    /**
     * Calculate the IVA of the Number.
     */
    public function calcola($number) {
        $iva = 22;
        $ris = $number / 100 * $iva;
        $arr = array("data" => $ris, "error" => null, "message" => null);
        return $arr;
    }
}
