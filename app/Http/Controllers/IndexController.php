<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $randomJobListings = JobListing::inRandomOrder()->limit(10)->get();

        return view('index', compact('randomJobListings'));
    }

}
