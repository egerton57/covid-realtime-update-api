<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CovidReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CovidReportController extends Controller
{
    public function index() {
        $covidReports = CovidReport::all();
        return response()->json($covidReports);
    }

    public function store(Request $request){
        $getDatas = Http::get('https://hpb.health.gov.lk/api/get-current-statistical');
        $obj = json_decode($getDatas);
        // echo $obj->data->local_total_cases;

        $covidReports = new CovidReport;
        $covidReports->new_cases = $obj->data->local_new_cases;
        $covidReports->active_cases = $obj->data->local_active_cases;
        $covidReports->total_cases = $obj->data->local_total_cases;
        $covidReports->deaths = $obj->data->local_deaths;
        $covidReports->recovered = $obj->data->local_recovered;
        $covidReports->sum_of_patients_in_hospitals = $obj->data->local_total_number_of_individuals_in_hospitals;

        //check if table is empty or not
        if (CovidReport::exists()) {
             $covidReports->update([

                'new_cases' => $obj->data->local_new_cases, 
                'active_cases' => $obj->data->local_active_cases,
                'total_cases' => $obj->data->local_total_cases,
                'deaths' => $obj->data->local_deaths,
                'recovered' => $obj->data->local_recovered,
                'sum_of_patients_in_hospitals' => $obj->data->local_total_number_of_individuals_in_hospitals,

                ]);

             die();

        } else {
            $covidReports->save();
            die();
        }
    }
}
        // $apiDatas = Http::get('https://hpb.health.gov.lk/api/get-current-statistical');
        // return response($apiDatas);