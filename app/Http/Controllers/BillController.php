<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('bill.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function store(Request $request)
    {

        $bill = new Bill();
        $bill->fill($request->only('bill_date', 'customer_id', 'employee_id', 'bill_price'));
        $services = explode(",", $request->get('service_id'));
        DB::beginTransaction();
        try {
            $bill->shop_id = session('shop_id');
            $bill->save();
            $bill->services()->attach($services);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'error' => $e,
                'bill' => $bill,
                'service' => $services
            ]);
        }
        DB::commit();
        return \response()->json([
            'status' => true,
            'data' => $bill
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Bill $bill
     * @return Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bill $bill
     * @return Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Bill $bill
     * @return Response
     */
    public function update(Request $request, Bill $bill)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bill $bill
     * @return Response
     */
    public function destroy(Bill $bill)
    {
        //
    }

    /**
     * Give specified/all resources from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function get(Request $request)
    {
        if ($request->has(['start_date', 'end_date'])) {
            $start_date = Carbon::createFromFormat('d-m-Y', $request->get('start_date'))->format('Y-m-d');
            $end_date = Carbon::createFromFormat('d-m-Y', $request->get('end_date'))->format('Y-m-d');
            $bills = Bill::with(['services', 'customer', 'employee'])
                ->whereBetween('bill_date', [$start_date, $end_date]);
        } else {
            $today = Carbon::today();
            $bills = Bill::with(['services', 'customer', 'employee'])
                ->where('bill_date', $today);
        }
        if ($request->has('employee_id') && $request->get('employee_id')) {
            $bills = $bills->where('employee_id', $request->get('employee_id'));
        }
        $bills = $bills->get();
        return response()->json([
            'status' => true,
            'data' => $bills
        ]);
    }
}
