<?php

namespace App\Http\Controllers;

use App\Models\ReportProduct;
use App\Models\Store;
use App\Models\StoreArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ViewController extends Controller
{
    public function index()
    {
        return view('layout');
    }

    public function areas()
    {
        $areas = StoreArea::all();

        return response()->json([
            'areas' => $areas
        ]);
    }

    public function filter(Request $request)
    {
        $areas = $request->area;

        $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->format('Y-m-d');
        $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->format('Y-m-d');

        $arrChart = [];

        $reportRowTable = ReportProduct::groupBy('product_id')
                            ->whereBetween('tanggal', [$dateFrom, $dateTo])
                            ->groupBy('product_id')
                            ->get();

        $productReports = ReportProduct::with('Product')
                            ->whereBetween('tanggal', [$dateFrom, $dateTo])
                            ->groupBy('product_id')
                            ->get();

        foreach ($areas as $area) {
            $stores = Store::with('Area')
                    ->where('area_id', '=', $area)->get();

            foreach ($stores as $store) {
                $report = ReportProduct::join('store as s', 'report_product.store_id', '=', 's.store_id')
                            ->select('compliance', 'product_id', 's.store_id', 's.area_id', 'tanggal')
                            ->where('area_id', '=', $area)
                            ->whereBetween('tanggal', [$dateFrom, $dateTo])
                            ->groupBy('area_id')
                            ->sum('compliance');

                $reportArea = ReportProduct::with('Store.Area')
                        ->where('store_id', '=', $store->store_id)
                        ->groupBy('store_id')
                        ->first();

                $reportRow = ReportProduct::join('store as s', 'report_product.store_id', '=', 's.store_id')
                                ->select('compliance', 'product_id', 's.store_id', 's.area_id')
                                ->where('area_id', '=', $area)
                                ->whereBetween('tanggal', [$dateFrom, $dateTo])
                                ->get()
                                ->count();
            }

            $result = $report/$reportRow*100;
            $arrChart[] = (object) ['area' => $reportArea->Store->Area->area_name, 'result' => $result];

        }

        return view('layout-filter')->with([
            'arrChart' => $arrChart,
            'reportRowTable' => $reportRowTable,
            'productReports' => $productReports
        ]);
    }

}
