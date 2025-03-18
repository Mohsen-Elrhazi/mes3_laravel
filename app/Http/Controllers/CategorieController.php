<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorie = Categorie::all();
        
        return response()->json([
            "status" => "success",
            "data" => $categorie
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try{
        $categorie= new Categorie();
        $categorie->name=$request->name;
        $categorie->save();

        return response()->json([
            "status" => "success",
            "message" => "categorie a ete cree",
            "data" => $categorie
        ], 201);
        
        
    }catch(\Exception $e){
        return response()->json([
            'status'=> 'error',
            'message'=> $e->getMessage(),
        ],401);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        return response()->json([
            "status" => "success",
            "data" => $categorie
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        try{
            $categorie->name=$request->name;
            $categorie->save();
    
            return response()->json([
                "status" => "success",
                "message" => "categorie a ete modifie",
                "data" => $categorie
            ], 200);
            
            
        }catch(\Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> $e->getMessage(),
            ],401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        try{
            $categorie->delete();

            return response()->json([
                "status" => "success",
                "message" => "categorie a ete supprime",
                "data" => NULL
            ], 200);
            
            
        }catch(\Exception $e){
            return response()->json([
                'status'=> 'error',
                'message'=> $e->getMessage(),
            ],401);
        }
    }
}