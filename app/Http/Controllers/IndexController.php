<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $randomJobListings = JobListing::inRandomOrder()->limit(10)->get();
        foreach ($randomJobListings as $jobListing) {
            // Tel hoe vaak de joblisting voorkomt in de pivot tabel user_job_listing
            $count = DB::table('user_job_listing')
                ->where('vacature_id', $jobListing->id)
                ->count();

            // Voeg aan die specifieke job_listing toe hoe vaak die er in staat
            $jobListing->wachtlijst = $count + 1;
        }
        return view('index', compact('randomJobListings'));
    }

}
