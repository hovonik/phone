<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.product.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'min:2|max:2000',
            'network_technology' => 'min:2|max:500',
            'launch_announced' => 'min:2|max:500',
            'launch_status' => 'min:2|max:500',
            'body_dimensions' => 'min:2|max:500',
            'body_weight' => 'min:2|max:500',
            'body_build' => 'min:2|max:500',
            'body_sim' => 'min:2|max:500',
            'memory_card_slot' => 'min:2|max:500',
            'memory_internal' => 'min:2|max:500',
            'battery_type' => 'min:2|max:500',
            'battery_charging' => 'min:2|max:500',
            'category' => 'required|numeric|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validate->fails()) {
            return redirect(route('products.create'))->withErrors($validate)->withInput();
        }
        try {
            $network = json_encode(['network_technology' => $request->network_technology]);
            $launch = json_encode(['launch_announced' => $request->launch_announced, 'launch_status' => $request->launch_status]);
            $body = json_encode(['body_dimensions' => $request->body_dimensions, 'body_weight' => $request->body_weight, 'body_build' => $request->body_build, 'body_sim' => $request->body_sim]);
            $memory = json_encode(['memory_card_slot' => $request->memory_card_slot, 'memory_internal' => $request->memory_internal]);
            $battery = json_encode(['battery_type' => $request->battery_type, 'battery_charging' => $request->battery_charging]);
            $imageName = sprintf('%d.%s', time(), $request->image->extension());
            $request->image->move(public_path('images/product'), $imageName);
            Product::query()->create([
                'name' => $request->name,
                'description' => $request->description,
                'network' => $network,
                'launch' => $launch,
                'body' => $body,
                'memory' => $memory,
                'battery' => $battery,
                'image' => $imageName,
                'category_id' => $request->category,
                ]);
        } catch (\Exception $e){
            Log::error($e->getMessage());
        }
        return redirect('dashboard/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $network = json_decode($product->network);
        $launch = json_decode($product->launch);
        $body = json_decode($product->body);
        $memory = json_decode($product->memory);
        $battery = json_decode($product->battery);
        $updatedProduct = (object) [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'network_technology' => $network->network_technology,
            'launch_announced' => $launch->launch_announced,
            'launch_status' => $launch->launch_status,
            'body_dimensions' => $body->body_dimensions,
            'body_weight' => $body->body_weight,
            'body_build' => $body->body_build,
            'body_sim' => $body->body_sim,
            'memory_card_slot' => $memory->memory_card_slot,
            'memory_internal' => $memory->memory_internal,
            'battery_type' => $battery->battery_type,
            'battery_charging' => $battery->battery_charging,
            'category_id' => $product->category_id,
            'image' => $product->image,
        ];
        return view('dashboard.product.edit', ['product' => $updatedProduct, 'categories' => Category::all()], );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'min:2|max:2000',
            'network_technology' => 'min:2|max:500',
            'launch_announced' => 'min:2|max:500',
            'launch_status' => 'min:2|max:500',
            'body_dimensions' => 'min:2|max:500',
            'body_weight' => 'min:2|max:500',
            'body_build' => 'min:2|max:500',
            'body_sim' => 'min:2|max:500',
            'memory_card_slot' => 'min:2|max:500',
            'memory_internal' => 'min:2|max:500',
            'battery_type' => 'min:2|max:500',
            'battery_charging' => 'min:2|max:500',
            'category' => 'required|numeric|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validate->fails()) {
            return redirect(route('products.create'))->withErrors($validate)->withInput();
        }
        try {
            $network = json_encode(['network_technology' => $request->network_technology]);
            $launch = json_encode(['launch_announced' => $request->launch_announced, 'launch_status' => $request->launch_status]);
            $body = json_encode(['body_dimensions' => $request->body_dimensions, 'body_weight' => $request->body_weight, 'body_build' => $request->body_build, 'body_sim' => $request->body_sim]);
            $memory = json_encode(['memory_card_slot' => $request->memory_card_slot, 'memory_internal' => $request->memory_internal]);
            $battery = json_encode(['battery_type' => $request->battery_type, 'battery_charging' => $request->battery_charging]);
            $updatedProduct = [
                'name' => $request->name,
                'description' => $request->description,
                'network' => $network,
                'launch' => $launch,
                'body' => $body,
                'memory' => $memory,
                'battery' => $battery,
                'category_id' => $request->category,
            ];
            $product = Product::query()->findOrFail($id);
            if(!empty($request->file('image'))){
                $deleteOldImage = public_path(sprintf('images/product/%s', $product->image));
                unlink($deleteOldImage);
                $imageName = sprintf('%d.%s', time(), $request->image->extension());
                $request->image->move(public_path('images/product'), $imageName);
                $updatedProduct['image'] = $imageName;
            }
            $product->update($updatedProduct);
        } catch (\Exception $e){
            Log::error($e->getMessage());
        }
        return redirect('dashboard/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::query()->findOrFail($id)->delete();
        return back();
    }
}
