<?php

namespace App\Http\Controllers\Scolarite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Scolarite\YearFormRequest;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scolarite.years.index',[
            'years' => Year::paginate(5)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scolarite.years.form',[
            'year' => new Year()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(YearFormRequest $requete)
    {
        DB::beginTransaction();
        try{
            $year = new Year();
            $year->libelle_annee_academique  = $requete->libelle_annee_academique ;
            $year->save();
            DB::commit();
            return to_route('scolarite.year.index')->with('success', 'la year a bien été crée');
            }catch(\Exception $e){
                DB::rollBack();
                return to_route('scolarite.year.index')->with('error', 'lCette année existe déjà !');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Year $year)
    {
        return view('scolarite.years.form',[
            'year' => $year 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(YearFormRequest $requete, Year $year)
    {
        $year->libelle_annee_academique = $requete->libelle_annee_academique;
        $year->save();
        return to_route('scolarite.year.index')->with('success', 'la yearn a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Year $year)
    {
        $year->delete();
        return to_route('scolarite.year.index')->with('success', 'La year a bien été supprimé');
    }
}
