<?php

namespace Ado\Spark\Interactions\Settings\PaymentMethod;

use Ado\Spark\Contracts\Interactions\Settings\PaymentMethod\RedeemCoupon;

class RedeemBraintreeCoupon implements RedeemCoupon
{
    /**
     * {@inheritdoc}
     */
    public function handle($billable, $coupon)
    {
        $billable->applyCoupon($coupon, 'default', true);
    }
}
