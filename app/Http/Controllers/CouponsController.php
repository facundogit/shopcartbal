<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Jobs\UpdateCoupon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return back()->withErrors('Cupon Invalido. Intente de nuevo.');
        }

        dispatch_now(new UpdateCoupon($coupon));

        return back()->with('success_message', 'Cupon Aplicado');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return back()->with('success_message', 'Cupon Removido.');
    }
}
