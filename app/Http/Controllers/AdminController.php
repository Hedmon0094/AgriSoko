<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $loanStats = DB::table('loans')
            ->selectRaw('status, COUNT(*) as total, SUM(amount) as total_amount')
            ->groupBy('status')
            ->get();

        return response()->json($loanStats);
    }
}
