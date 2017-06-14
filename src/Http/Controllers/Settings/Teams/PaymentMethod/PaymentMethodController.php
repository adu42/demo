<?php

namespace Ado\Spark\Http\Controllers\Settings\Teams\PaymentMethod;

use Ado\Spark\Team;
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
     * @param  Team  $team
     * @return Response
     */
    public function update(UpdatePaymentMethodRequest $request, Team $team)
    {
        abort_unless($request->user()->ownsTeam($team), 403);

        Spark::interact(UpdatePaymentMethod::class, [
            $team, $request->all(),
        ]);
    }
}
