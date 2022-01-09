<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Recipemanage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRecipemanageRequest;
use App\Http\Requests\UpdateRecipemanageRequest;
use Illuminate\Support\Facades\DB;


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
    public function store(Request $request)
    {
        DB::table('recipes')->insert(['user_id'=>auth()->user()->id,'name'=>$_POST['name'],
            'content'=>$_POST['content'],'person'=>$_POST['person'],'time'=>$_POST['time'],'material'=>$_POST['material'],
            'step'=>$_POST['step'],'photo'=>$_POST['photo'],'status'=>$_POST['status']]);
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
    public function edit(Recipemanage $recipemanage,$id)
    {
        $data = Recipe::find($id);
        return view('manage.recipes.edit', ['recipe' => $data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipemanageRequest  $request
     * @param  \App\Models\Recipemanage  $recipemanage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipemanageRequest $request, Recipemanage $recipemanage,$id)
    {
        $recipe=Recipe::find($id);
        $recipe->update(['name' => $_POST['name']]);
        $recipe->update(['content' => $_POST['content']]);
        $recipe->update(['person' => $_POST['person']]);
        $recipe->update(['quan' => $_POST['quantity']]);
        $recipe->update(['content' => $_POST['content']]);
        $recipe->update(['photo' => $_POST['photo']]);

        return redirect()->route('admin.recipes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipemanage  $recipemanage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipemanage $recipemanage,$id)
    {
        Recipe::destroy($id);
        return redirect()->route('manage.recipes.index');
    }
}
