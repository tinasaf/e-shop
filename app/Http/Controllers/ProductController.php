<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Product; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;

//import Facades Storage
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Import Facade untuk Auth

class ProductController extends Controller
{

    public function superadminProduct(){
        session(['previous_list_url' => url()->current()]); // untuk menyimpan url list product ke dalam session
        $products = Product::all();
        return view('superadmin.product', compact('products'));
    }

    public function superadminProductCreate(){
        return view('superadmin.productCreate');
    }

    public function superadminProductEdit($id)
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('superadmin.productEdit', compact('product'));
    }
 
    public function adminProduct(){
        session(['previous_list_url' => url()->current()]); // untuk menyimpan url list product ke dalam session
        $products = Product::all();
        return view('admin.product', compact('products'));
    }

    public function adminProductCreate(){
        return view('admin.productCreate');
    }

    public function adminProductEdit($id)
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('admin.productEdit', compact('product'));
    }

    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $products = Product::latest()->paginate(10);

        //render view with products
        return view('products.index', compact('products'));
    }

    public function productUser() : View
    {
        //get all products
        $products = Product::latest()->paginate(10);

        //render view with products
        return view('user.products', compact('products'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        //create product
        Product::create([
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);

        $user = Auth::user();
        $userRole = $user->role;

        if ($userRole === 'superadmin'){
            return redirect()->route('superadminProduct')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('adminProduct')->with(['success' => 'Data Berhasil Disimpan!']); 
        }
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('products.show', compact('product'));
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('products.edit', compact('product'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:4',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //get product by ID
        $product = Product::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            //delete old image
            Storage::delete('public/products/'.$product->image);

            //update product with new image
            $product->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);

        } else {

            //update product without image
            $product->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        }

        //redirect to index
        $user = Auth::user();
        $userRole = $user->role;

        if ($userRole === 'superadmin'){
            return redirect()->route('superadminProduct')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('adminProduct')->with(['success' => 'Data Berhasil Dihapus']); 
        }
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //delete image
        Storage::delete('public/products/'. $product->image);

        //delete product
        $product->delete();

        //redirect to index
        $user = Auth::user();
        $userRole = $user->role;

        if ($userRole === 'superadmin'){
            return redirect()->route('superadminProduct')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('adminProduct')->with(['success' => 'Data Berhasil Dihapus']); 
        }
    }
}