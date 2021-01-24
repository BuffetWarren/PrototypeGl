<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Membre;
use Illuminate\Http\Request;

class MembresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $membres = Membre::latest()->paginate(25);

        return $membres;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $membre = Membre::create($request->all());

        return response()->json($membre, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membre = Membre::findOrFail($id);

        return $membre;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $membre = Membre::findOrFail($id);
        $membre->update($request->all());

        return response()->json($membre, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Membre::destroy($id);

        return response()->json(null, 204);
    }
}
