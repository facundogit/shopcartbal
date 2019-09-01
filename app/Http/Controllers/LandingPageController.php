<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class LandingPageController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

   public function __construct()
    {
         $agent = new Agent();
        
        if ($agent->isMobile()) 
        {
            $this->middleware('auth');
        }
     }

    public function index()
    {   

        $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();


        return view('landing-page')->with('products', $products);  

        
    }
}
