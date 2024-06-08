<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function showReport(Request $request)
    {
        $tableData = json_decode($request->input('tableData'), true);
        return view('profitability.report', ['tableData' => $tableData]);
    }
}