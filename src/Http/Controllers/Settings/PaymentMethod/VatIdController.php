<?php

namespace Ado\Spark\Http\Controllers\Settings\PaymentMethod;

use Ado\Spark\Spark;
use Illuminate\Http\Request;
use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Contracts\Repositories\UserRepository;

class VatIdController extends Controller
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
     * Update the VAT ID for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'vat_id' => 'max:50|vat_id',
        ]);

        Spark::call(UserRepository::class.'@updateVatId', [
            $request->user(), $request->vat_id
        ]);
    }
}
