<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Membre;
use Illuminate\Http\Request;

class MembresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $membres = Membre::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('login', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('ville', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('confirmpassword', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $membres = Membre::latest()->paginate($perPage);
        }

        return view('admin.membres.index', compact('membres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.membres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Membre::create($requestData);

        return redirect('admin/membres')->with('flash_message', 'Membre added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $membre = Membre::findOrFail($id);

        return view('admin.membres.show', compact('membre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $membre = Membre::findOrFail($id);

        return view('admin.membres.edit', compact('membre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $membre = Membre::findOrFail($id);
        $membre->update($requestData);

        return redirect('admin/membres')->with('flash_message', 'Membre updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Membre::destroy($id);

        return redirect('admin/membres')->with('flash_message', 'Membre deleted!');
    }
}
