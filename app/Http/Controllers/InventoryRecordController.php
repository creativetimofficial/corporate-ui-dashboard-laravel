<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryRecord;

class InventoryRecordController extends Controller
{
    public function expensesChart()
    {
        $expenses = InventoryRecord::select('expenses')
            ->groupBy('expenses')
            ->orderBy('expenses', 'desc')
            ->get();

        $labels = $expenses->pluck('expenses');
        $data = $expenses->pluck('expenses');

        return view('expenses-chart', compact('labels', 'data'));
    }
}
