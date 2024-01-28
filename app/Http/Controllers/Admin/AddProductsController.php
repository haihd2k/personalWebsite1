<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddProductsController extends Controller
{
    //

    public function getAddProducts(){

        return view('admin.products.add-products');
    }
}
