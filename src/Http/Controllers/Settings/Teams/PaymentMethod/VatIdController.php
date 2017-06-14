<?php

namespace Ado\Spark\Http\Controllers\Settings\Teams\PaymentMethod;

use Ado\Spark\Team;
use Ado\Spark\Spark;
use Illuminate\Http\Request;
use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Contracts\Repositories\TeamRepository;

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
     * Update the VAT ID for the team.
     *
     * @param  Request  $request
     * @param  Team  $team
     * @return Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'vat_id' => 'max:50|vat_id',
        ]);

        Spark::call(TeamRepository::class.'@updateVatId', [
            $team, $request->vat_id
        ]);
    }
}
