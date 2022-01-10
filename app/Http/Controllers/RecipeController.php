<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $data = DB::table('recipes')->where('status','0')->get();
            return view('index',['recipes' => $data]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($status='no')
    {
        session_start();
        $id=$_SESSION['id'];
        if(Auth::check())
        {
            $data4 = DB::table('favorites')->where('recipe_id',$id)->get();
            foreach ($data4 as $favorite)
            {
                if($favorite->user_id==auth()->user()->id)
                    $status='yes';
            }
            if ($status=='no')
            {
                DB::table('favorites')->insert(['user_id'=>auth()->user()->id, 'recipe_id'=>$id]);
                echo "<script>alert('已加入我的最愛'); location.href='../';</script>";
            }
            else if($status=='yes')
            {
                echo "<script>alert('該食譜已在我的最愛'); location.href='../';</script>";
            }
        }
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request)
    {
        /*echo "<script>alert('test'); location.href ='../';</script>";
        if(Auth::check())
        {
            $data4 = DB::table('favorites')->where('recipe_id',$request)->get();
            foreach ($data4 as $favorite)
            {
                if($favorite->user_id==auth()->user()->id)
                    $status='yes';
            }
            if ($status=='no')
            {
                DB::table('favorites')->insert(['user_id'=>auth()->user()->id, 'recipe_id'=>$request]);
                echo "<script>alert('已加入我的最愛'); location.href='../';</script>";
            }
            else if($status=='yes')
            {
                echo "<script>alert('該食譜已在我的最愛');</script>";
            }
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($recipe)
    {
        $data2 = DB::table('recipes')->where('status','0')->get();;
        return view('index', ['recipes' => $data2], ['recipe2' => $data2]);
    }

    public function search()
    {
        $search=$_GET['search'];
        $data3 = DB::table('recipes')->where('name', 'like', '%'.$search.'%')->get();
        return view('index', ['recipes' => $data3]);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipeRequest  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
