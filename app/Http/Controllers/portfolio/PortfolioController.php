<?php

namespace App\Http\Controllers\portfolio;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio\Header;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
       $data= Header::all();
       $cate= Category::all();
    //    dd($data);

        return view('portfolio.portfolio',compact(['data' ,'cate']));
    }
}
