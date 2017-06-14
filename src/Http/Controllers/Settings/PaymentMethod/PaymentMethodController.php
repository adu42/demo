<?php

namespace Ado\Spark\Http\Controllers\Settings\PaymentMethod;

use Ado\Spark\Spark;
use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Contracts\Interactions\Settings\PaymentMethod\UpdatePaymentMethod;
use Ado\Spark\Contracts\Http\Requests\Settings\PaymentMethod\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the payment method for the user.
     *
     * @param  UpdatePaymentMethodRequest  $request
     * @return Response
     */
    public function update(UpdatePaymentMethodRequest $request)
    {
        Spark::interact(UpdatePaymentMethod::class, [
            $request->user(), $request->all(),
        ]);
    }
}
