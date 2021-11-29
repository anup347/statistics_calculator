<?php

namespace App\Http\Controllers\Statistics;

use App\Models\Log;
use App\Models\Statistics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StatisticsController extends Controller
{


    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('statistics.index');
    }


    /**
     * calculate
     *
     * @param  mixed $request
     * @return void
     */
    public function calculate(Request $request)
    {
        $rules = array(
            "num_series" => 'required'
        );

        //validate
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return "error";
        } else {
            //perform calculation based on user action
            $number_array = explode(",", $request->num_series);
            $count = count($number_array);
            $result = 0;
            switch ($request->action) {
                case 'mean':

                    $result = array_sum($number_array) / $count;
                    break;

                case 'median':

                    if ($count % 2 == 0) {
                        $median = $count / 2;
                    } else {
                        $median = ($count + 1) / 2;
                    }
                    $result = $number_array[$median - 1];
                    break;

                case 'mode':

                    $count_array = array_count_values($number_array);
                    $mode = max($count_array);
                    $result = implode(',', array_keys($count_array, $mode));
                    break;
            }
            //create log
            Log::create([
                'number_series' => $request->num_series,
                'operation' => $request->action,
                'result' => $result
            ]);

            return $result;
        }
    }
}
