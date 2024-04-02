<?php

namespace App\Http\Controllers\Scolarite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Scolarite\FormationFormRequest;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scolarite.formations.index',[
            'formations' => Formation::paginate(5)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scolarite.formations.form',[
            'formation' => new Formation()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormationFormRequest $requete)
    {
        DB::beginTransaction();
        try{
        $formation = new Formation();
        $formation->libelle_formation = $requete->libelle_formation;
        $formation->save();
        DB::commit();
        return to_route('scolarite.formation.index')->with('success', 'la formation a bien été créée');
        }catch(\Exception $e){
            DB::rollBack();
            return to_route('scolarite.formation.index')->with('error', 'Cette formation existe déjà !');
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
    public function edit(Formation $formation)
    {
        return view('scolarite.formations.form',[
            'formation' => $formation 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormationFormRequest $requete, Formation $formation)
    {
        DB::beginTransaction();
        try{
        $formation->libelle_formation = $requete->libelle_formation;
        $formation->save();
        DB::commit();
        return to_route('scolarite.formation.index')->with('success', 'la formationn a bien été modifié');
        }catch(\Exception $e){
            DB::rollBack();
            return to_route('scolarite.formation.index')->with('error', 'Cette formation existe déjà !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();
        return to_route('scolarite.formation.index')->with('success', 'La formation a bien été supprimé');
    }
}
