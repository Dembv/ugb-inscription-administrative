<?php

namespace App\Http\Controllers\Scolarite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Scolarite\InformationFormRequest;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('scolarite.informations.index',[
            'informations' => Information::paginate(25),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scolarite.informations.form',[
            'information' => new Information()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InformationFormRequest $requete)
    {
        /** @var UploadedFile $image */

        $image = $requete->validated('image');

        $imagePath = $image->store('uploads/informations', 'public');

        DB::beginTransaction();
        try{
            $information = new Information();
            $information->titre = $requete->titre;
            $information->contenu = $requete->contenu;
            $information->image = $imagePath;;
            $information->save();
            DB::commit();
            return to_route('scolarite.information.index')->with('success', 'l\'information a bien été crée');
        }catch(\Exception $e){
            DB::rollBack();
            return to_route('scolarite.information.index')->with('error', 'Verifier que les informations saisies sont correctes!');
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
    public function edit(Information $information)
    {
        return view('scolarite.informations.form',[
            'information' => $information 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InformationFormRequest $requete,  Information $information)
    {
        /** @var UploadedFile $image */

        $image = $requete->image;

        if($image) {
            $imagePath = $image->store('uploads/informations', 'public');
        }
        DB::beginTransaction();
        try{
            $information->titre = $requete->titre;
            $information->contenu = $requete->contenu;
            if($image) {
                $information->image = $imagePath;
            }
            $information->save();
            DB::commit();
            return to_route('scolarite.information.index')->with('success', 'l\'information a bien été modifié');
            }catch(\Exception $e){
                DB::rollBack();
                return to_route('scolarite.information.index')->with('error', 'Verifier que les informations saisies sont correctes!');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        $information->delete();
        return to_route('scolarite.information.index')->with('success', 'L\'information a bien été supprimé');
    }
}
