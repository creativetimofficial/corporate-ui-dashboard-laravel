<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryRecord;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     // Fetch expenses data grouped by month
    //     $monthlyExpenses = InventoryRecord::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(expenses) as total_expenses')

    //         ->groupBy('year', 'month')
    //         ->orderBy('year', 'desc')
    //         ->orderBy('month', 'desc')
    //         ->get();

    //           // Prepare data for daily chart
    //     $dailyLabels = [];
    //     $dailyData = [];

    //     // Fetch expenses data grouped by day
    //     $dailyExpenses = InventoryRecord::selectRaw('DATE(created_at) as date, SUM(expenses) as total_expenses')
    //         ->where('created_at', '>=', Carbon::now()->subDays(7))
    //         ->groupBy('date')
    //         ->orderBy('date', 'desc')
    //         ->get();

    //     // Prepare data for monthly chart
    //     $monthlyLabels = [];
    //     $monthlyData = [];

    //     foreach ($monthlyExpenses as $expense) {
    //         $monthlyLabels[] = Carbon::createFromDate($expense->year, $expense->month)->format('M Y');
    //         $monthlyData[] = $expense->total_expenses;
    //     }

      

    //     foreach ($dailyExpenses as $expense) {
    //         $dailyLabels[] = Carbon::parse($expense->date)->format('M d, Y');
    //         $dailyData[] = $expense->total_expenses;
    //     }

    //     return view('dashboard', [
    //         'monthlyLabels' => json_encode($monthlyLabels),
    //         'monthlyData' => json_encode($monthlyData),
    //         'dailyLabels' => json_encode($dailyLabels),
    //         'dailyData' => json_encode($dailyData),
    //     ]);
    // }

    public function index()
{
    // Fetch expenses data for the last 7 days (daily)
    $dailyExpenses = InventoryRecord::selectRaw('DATE(created_at) as date, SUM(expenses) as total_expenses')
        ->where('created_at', '>=', Carbon::now()->subDays(7))
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    // Prepare data for daily chart
    $dailyLabels = [];
    $dailyData = [];

    // Fill in missing dates with zero expenses
    $startDate = Carbon::now()->subDays(7)->startOfDay();
    $endDate = Carbon::now()->endOfDay();
    $currentDate = $startDate;

    while ($currentDate <= $endDate) {
        $dateString = $currentDate->format('M d, Y');
        $dailyLabels[] = $dateString;

        // Find the matching record for the current date
        $expenseData = $dailyExpenses->where('date', $currentDate->toDateString())->first();

        // If record exists, use total_expenses; otherwise, set to 0
        $dailyData[] = $expenseData ? $expenseData->total_expenses : 0;

        $currentDate->addDay();
    }

    // Fetch expenses data for the last 12 months (monthly)
    $monthlyExpenses = InventoryRecord::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(expenses) as total_expenses')
        ->where('created_at', '>=', Carbon::now()->subMonths(12))
        ->groupBy('year', 'month')
        ->orderByRaw('year asc, month asc')
        ->get();

    // Prepare data for monthly chart
    $monthlyLabels = [];
    $monthlyData = [];

    $currentDate = Carbon::now()->subMonths(12)->startOfMonth();

    while ($currentDate <= Carbon::now()->endOfMonth()) {
        $monthlyLabels[] = $currentDate->format('M Y');

        // Find the matching record for the current year and month
        $expenseData = $monthlyExpenses->where('year', $currentDate->year)
    ->where('month', $currentDate->month)
    ->first();

        // If record exists, use total_expenses; otherwise, set to 0
        $monthlyData[] = $expenseData ? $expenseData->total_expenses : 0;

        $currentDate->addMonth();
    }

    return view('dashboard', [
        'dailyLabels' => json_encode($dailyLabels),
        'dailyData' => json_encode($dailyData),
        'monthlyLabels' => json_encode($monthlyLabels),
        'monthlyData' => json_encode($monthlyData),
    ]);
}

}
