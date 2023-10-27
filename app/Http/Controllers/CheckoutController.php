<?php

namespace App\Http\Controllers;



use auth;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      if(Cart::count() <0) {
return redirect()->route('products.index');
      }

      Stripe::setApiKey('sk_test_51O5krpAEuQUl30qvHIRPS3GUuPgauMM32SMc0T2iL0LFUzS5BD3xZNol1PqXM07trL39oM7BRvr91Uwp603VDuvu00MHJgeqG9');

      $intent = PaymentIntent::create([
          'amount' => round(Cart::total()),
          'currency' => 'eur',

      ]);

      $clientSecret = Arr::get($intent, 'client_secret');
      return view('checkout.index', [
          'clientSecret' => $clientSecret
      ]);


    }

    /**²
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Cart::destroy();
        $data=$request->json()->all();
        return $data['paymentIntent'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
