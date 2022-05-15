<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tevekenyseg;
class TevekenysegController extends Controller
{
   // public function index(Request $request)
    public function index()
    {
      //  return Tevekenyseg::query()
        //    ->paginate(10000)->withQueryString();
        $tevekenysegek= response()->json(Tevekenyseg::all());
        return $tevekenysegek;
    }
}
