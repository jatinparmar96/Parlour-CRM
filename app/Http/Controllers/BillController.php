<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     */
    public function store(Request $request)
    {

        $bill = new Bill();
        $bill->fill($request->all());
        dd($bill);
        $bill->shop_id = session('shop_id');
        $bill->save();
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
}
