<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
        $brands=Brand::all();
        return view('pages.admin.attributes.create',compact('brands'));
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
            'name'=>'required'
        ]);

        try {
            DB::beginTransaction();

            $productImage=new ProductImageController();
            $fileNameImage=$productImage->upload($request->primaryImage,$request->images);

            $product=Product::create([
                'name'=>$request->name,
                'brand_id'=>$request->brand_id,
                'category_id'=>$request->category_id,
                'primary_image'=>$fileNameImage['fileNamePrimaryImage'],
                'is_active'=>$request->is_active,
                'delivery_amount'=>$request->delivery_amount
            ]);


            foreach($fileNameImage['fileNameImages'] as $images){
                ProductImage::create([
                    'product_id'=>$product->id,
                    'image'=>$images
                ]);
            }

            $attributeId=Attribute::find($request->attributes);
            $category=$attributeId->categories()->wherePivote('is_variation',1)->get()      ;

            $variation=new ProductVariationController();
            $productVarition=$variation->upload($product,$request->variations_ids);




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
