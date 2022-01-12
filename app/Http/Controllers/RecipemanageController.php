<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Recipemanage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRecipemanageRequest;
use App\Http\Requests\UpdateRecipemanageRequest;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;


class RecipemanageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('recipes')->where('user_id',auth()->user()->id)->get();
        return view('manage.recipes.index',['recipes' => $data]);;
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
    public function edit($id)
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
    public function update(UpdateRecipemanageRequest $request,$id)
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
    public function destroy($id)
    {
        Recipe::destroy($id);
        return redirect()->route('manage.recipes.index');
    }
}
