<?php

namespace App\Http\Controllers;

use App\Models\{Order, Payment};
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $payment = Payment::find($id);

        return view('order-complete')->with('payment', $payment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'order_id' => $request->order_id,
                'pay_type' => $request->pay_type == 'bank' ? 1 : 2,
                'status' => 1,
                'detail' => ['remittor' => $request->remittor],
                'total_amount' => $request->total_amount
            ];
            $res = Payment::create($data);

            Order::find($request->order_id)->update([
                'payments_id' => $res->id
            ]);

            // \Log::info("this > ".$res->detail['remittor']);

            if (empty($res)) throw new Exception("결제정보 저장에 실패했습니다.", 1);
            
            return response()->json(['result' => 'success', 'pid' => $res->id]);

        } catch (\Throwable $th) {
            $msg = $th->getMessage();

            return response()->json(['result' => 'fail', 'err' => $msg]);
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
