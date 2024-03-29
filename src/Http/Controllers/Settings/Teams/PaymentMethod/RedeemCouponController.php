<?php

namespace Ado\Spark\Http\Controllers\Settings\Teams\PaymentMethod;

use Ado\Spark\Team;
use Ado\Spark\Spark;
use Illuminate\Http\Request;
use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Contracts\Repositories\CouponRepository;
use Ado\Spark\Contracts\Interactions\Settings\PaymentMethod\RedeemCoupon;

class RedeemCouponController extends Controller
{
    /**
     * The coupon repository implementation.
     *
     * @var CouponRepository
     */
    protected $coupons;

    /**
     * Create a new controller instance.
     *
     * @param  \Ado\Spark\Contracts\Repositories\CouponRepository  $coupons
     * @return void
     */
    public function __construct(CouponRepository $coupons)
    {
        $this->coupons = $coupons;

        $this->middleware('auth');
    }

    /**
     * Redeem the given coupon code.
     *
     * @param  Request  $request
     * @param  Team  $team
     * @return Response
     */
    public function redeem(Request $request, Team $team)
    {
        abort_unless($request->user()->ownsTeam($team), 403);

        $this->validate($request, [
            'coupon' => 'required',
        ]);

        // We will verify that the coupon can actually be redeemed. In some cases even
        // valid coupons can not get redeemed by an existing user if this coupon is
        // running as a promotion for brand new registrations to the application.
        if (! $this->coupons->canBeRedeemed($request->coupon)) {
            return response()->json(['coupon' => [
                'This coupon code is invalid.'
            ]], 422);
        }

        Spark::interact(RedeemCoupon::class, [
            $team, $request->coupon
        ]);
    }
}
