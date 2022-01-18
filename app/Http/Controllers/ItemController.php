<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('id', 'desc')->with('brand', 'supplier', 'product')->get()->toArray();
        return $items;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $newItem = new Item();
            $newItem->sku = $request->input('sku');
            $newItem->product_id = $request->input('productId');
            $newItem->brand_id = $request->input('brandId');
            $newItem->supplier_id = $request->input('supplierId');
            $newItem->domain_id = $request->input('domainId');
            $newItem->mrp = $request->input('mrp');
            $newItem->discount = $request->input('discount');
            $newItem->price = $request->input('price');
            $newItem->quantity = $request->input('quantity');
            $newItem->save();
            $newItem['brand'] = $newItem->brand();
            $newItem['supplier'] = $newItem->supplier();
            $newItem['product'] = $newItem->product();
            return response()->json([
                'success'=>true, 
                'message'=>'string', 
                'data'=>$newItem
            ]);
        } catch (RepositoryException $e) {
            return response()->error(__('error.resolved', ['resource' => 'des Kommentars', 'resourceE' => 'comment']), 400, $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if($item->delete()) {
            return true;
        }
        return false;
    }
}
