<?php

namespace App\Http\Controllers;

use App\Models\Apartament;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\StoreApartamentRequest;
use App\Http\Requests\UpdateApartamentRequest;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ApartamentController extends Controller
{

    public function __construct()
    {
        $this->middleware('equal.token', ['only' => ['update', 'destroy']]);
        $this->middleware('apartament.middleware', ['only' => ['store','update']]);
        //$this->middleware(['restable', ['only' => ['resta']]]);
    }
    public function index(Request $request)
    {
        //return response()->json($request->input('city'));
        if ($request->input('city') == null) {
            //return response()->json($request->input('city'));
            $resultat = Apartament::all();
        } else {
            //return response()->json($request->input('city'));
            $resultat = Apartament::where('city', $request->input('city'))->get();
        }
        foreach ($resultat as $apartament) {
            $apartament->user;
            $apartament->platforms;
        }
        return response()->json($resultat, 200);
    }

    public function apartamentsRented($rented)
    {
        $dades = Apartament::where('rented', $rented)->get();
        foreach ($dades as $apartament) {
            $apartament->user;
        }
        return response()->json($dades);
    }

    public function apartamentsPremium()
    {
        return response()->json(Apartament::where('rented_price', '>', 1000)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create()
    //{
        //
    //}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartamentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        //return response()->json($id);
        $insert = $request->all();
        $insert['user_id'] = $id;
        $apartament = Apartament::create($insert);
        return response()->json($apartament, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartament  $apartament
     * @return \Illuminate\Http\Response
     */
    public function show(Apartament $apartament)
    {
        $apartament->platforms;
        $apartament->user;
        return response()->json($apartament);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartament  $apartament
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartament $apartament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartamentRequest  $request
     * @param  \App\Models\Apartament  $apartament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartament $apartament)
    {
        $update = $request->all();
        $update['user_id'] = auth()->user()->id;
        $apartament->fill($update)->save();
        return response()->json($apartament, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartament  $apartament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartament $apartament)
    {
        $apartament->delete();
        return response()->noContent();
    }
}
