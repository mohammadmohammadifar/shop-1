<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentId=Category::where('parent_id','!=',0)->get();
        $attributes=Attribute::all();

        return view('pages.admin.categories.create',compact('parentId','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'parent_id'=>'required',
            'is_active'=>'required',
        ]);

        try {
            DB::beginTransaction();

            $category=Category::create([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,

            ]);

            foreach($request->attributes_ids as $attributeId){
                $attribute=Attribute::findOrFail($attributeId);
                $attribute->categories()->attach($category->id,[
                    'is_filter'=>in_array($attributeId,$request->is_filter)? 1 :0,
                    'is_variation'=> $request->variations_ids == $attributeId ? 1 : 0
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
