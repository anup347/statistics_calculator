<?php

namespace App\Http\Controllers\Calculus;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CalculusController extends Controller
{

    /**
     * index page
     *
     * @return void
     */
    public function index()
    {
        return view('calculus.index');
    }


    /**
     * Basic math calculation on given numbers
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
            
            $result = 0;
            $number_array = explode(",", $request->num_series);
            $count = count($number_array);
            //perform calculation based on user action
            switch ($request->action) {
                case 'add':
                    $result = array_sum($number_array);
                    break;

                case 'sub':
                    $result = $this->array_sub_values($number_array, $count);
                    break;

                case 'mod':
                    $result = $number_array[0] % $number_array[1];
                    break;

                case 'div':
                    $result = $number_array[0] / $number_array[1];
                    break;

                case 'prod':
                    $result = $this->array_prod_values($number_array, $count);
                    break;
            }

            // create log entry
            Log::create([
                'number_series' => $request->num_series,
                'operation' => $request->action,
                'result' => $result
            ]);

            return $result;
        }
    }


    /**
     * substract number series
     *
     * @param  mixed $number_array
     * @param  mixed $count
     * @return void
     */
    public function array_sub_values($number_array, $count)
    {
        $total = $number_array[0];
        for ($i = 1; $i < $count; $i++) {
            $total -= $number_array[$i];
        }
        return $total;
    }

    /**
     * multiply number series
     *
     * @param  mixed $number_array
     * @param  mixed $count
     * @return void
     */
    public function array_prod_values($number_array, $count)
    {
        $total = $number_array[0];
        for ($i = 1; $i < $count; $i++) {
            $total *= $number_array[$i];
        }
        return $total;
    }
}
