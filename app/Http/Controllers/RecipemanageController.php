<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Recipemanage;
use App\Http\Requests\StoreRecipemanageRequest;
use App\Http\Requests\UpdateRecipemanageRequest;

class RecipemanageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes=Recipe::orderBy('id','DESC')->get();
        $data=['recipes'=>$recipes];
        return view('manage.recipes.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecipemanageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipemanageRequest $request)
    {
        Recipe::create($request->all());
        return redirect()->route('manage.recipes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipemanage  $recipemanage
     * @return \Illuminate\Http\Response
     */
    public function show(Recipemanage $recipemanage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipemanage  $recipemanage
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipemanage $recipemanage)
    {
        $recipe=Recipe::find($id);
        $data=['post'=>$recipe];
        return view('manage.recipes.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipemanageRequest  $request
     * @param  \App\Models\Recipemanage  $recipemanage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipemanageRequest $request, Recipemanage $recipemanage)
    {
        $recipe=Recipe::find($id);
        $recipe->update($request->all());
        return redirect()->route('manage.recipes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipemanage  $recipemanage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipemanage $recipemanage)
    {
        Recipe::destroy($id);
        return redirect()->route('manage.recipes.index');
    }
}
