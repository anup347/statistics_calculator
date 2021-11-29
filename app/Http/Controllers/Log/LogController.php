<?php

namespace App\Http\Controllers\Log;

use App\Http\Controllers\Controller;
use App\Models\Calculus;
use App\Models\Log;
use App\Models\Statistics;
use Illuminate\Http\Request;

class LogController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('log.index');
    }
    
    /**
     * show
     *
     * @return void
     */
    public function show()
    {
        $logs = Log::all();
        return $logs;
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $log =Log::find($id);
        $log->delete();
        return "deleted";
    }
}
