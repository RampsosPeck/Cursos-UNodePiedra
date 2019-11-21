<?php

namespace Unopicursos\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(){
        $this->middleware(function($request, $next){

            //Comprobamos si en usuario esta suscrito a algun plan
            if(auth()->user()->subscribed('main')){
                return redirect('/')
                        ->with('message',['warning', __("Actualmente ya estás suscrito a otro plan")]);
            }
            return $next($request);
        })->only('plans','processSubscription');
    }

    public function plans()
    {
        return view('subscriptions.plans');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function processSubscription()
    {

        $token = request('stripeToken');
        try{
            if(\request()->has('coupon')){
                \request()->user()->mewSubscription('main', \request('type'))->withCoupon(\request('coupon'))->create($token);
            } else {
                \request()->user()->mewSubscription('main', \request('type'))->create($token);
            }
            return redirect(route('subscription.admin'))->with('message',['success', __("La subscripcion se ha llevado a cabo correctaemte")]);
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            return back()->with('message',['danger', $error]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin(Request $request)
    {

        return view('subscriptions.admin');
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
