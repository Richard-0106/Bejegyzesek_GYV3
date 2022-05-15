<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bejegyzes;

class BejegyzesController extends Controller
{
  //  public function index(Request $request)
  public function index()
  {
    // return Bejegyzes::query()
    //     ->when($request->expand, function ($query, $child) {
    //         $query->with($child);
    //     })
    //     ->paginate(10000)->withQueryString();
    $bejegyzesek = response()->json(Bejegyzes::with('tevekenyseg')->get()); //ha with -el van összekapcsolva akkor get. kulonben all
    return $bejegyzesek;
  }

  public function f(Request $request)
  {
    return Bejegyzes::query()
      ->when($request->search, function ($query, $search) {
        $query->where(function ($builder) use ($search) {
          $builder
            ->where('osztaly_id', 'like', '%' . $search . '%')
            ->orWhere('pontszam', 'like', '%' . $search . '%');
        });
      })
      ->when($request->sort, function ($query, $column) use ($request) {
        $query->with('tevekenyseg')->orderBy($column, $request->get('order', 'asc'))->get();
      })
      ->get();
  }
  public function osztaly($id)
  {
    $bejegyzesek = Bejegyzes::with('tevekenyseg')->where('osztaly_id', $id)->get();
    return $bejegyzesek;
  }
  public function store(Request $request)
  {
    //$request->validate([
    //  'tevekenyseg_id' => 'required',
    //'osztaly_id' => 'required',
    // ]);
    // Bejegyzes::create($request->all());
    echo $request;
    $bejegyzesek = new Bejegyzes();
    $bejegyzesek->allapot = 0;
    $bejegyzesek->tevekenyseg_id = $request->tevekenyseg_id;
    $bejegyzesek->osztaly_id = $request->osztaly_id; //hozzáfüzések
    $bejegyzesek->save();
    return Bejegyzes::find($bejegyzesek->id); //mi járt a tanárnő fejében???

  }
}
