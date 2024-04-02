<?php

namespace App\Http\Controllers\Scolarite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Scolarite\LevelFormRequest;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scolarite.levels.index',[
            'levels' => Level::paginate(5),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scolarite.levels.form',[
            'level' => new Level()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelFormRequest $requete)
    {
        DB::beginTransaction();
        try{
            $level = new Level();
            $level->libelle_niveau = $requete->libelle_niveau;
            $level->save();
            DB::commit();
            return to_route('scolarite.level.index')->with('success', 'le niveau a bien été crée');
            }catch(\Exception $e){
                DB::rollBack();
                return to_route('scolarite.level.index')->with('error', 'Ce niveau existe déjà!');
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
    public function edit(Level $level)
    {
        return view('scolarite.levels.form',[
            'level' => $level 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LevelFormRequest $requete, Level $level)
    {
        DB::beginTransaction();
        try{
            $level->libelle_niveau = $requete->libelle_niveau;
            $level->save();
            DB::commit();
            return to_route('scolarite.level.index')->with('success', 'le niveau a bien été modifié');
        }catch(\Exception $e){
            DB::rollBack();
            return to_route('scolarite.level.index')->with('error', 'Ce niveau existe déjà!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return to_route('scolarite.level.index')->with('success', 'L\'étudiant a bien été supprimé');
    }
}
