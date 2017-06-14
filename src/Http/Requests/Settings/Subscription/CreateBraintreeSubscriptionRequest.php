<?php

namespace Ado\Spark\Http\Requests\Settings\Subscription;

use Ado\Spark\Spark;
use Illuminate\Support\Facades\Validator;
use Ado\Spark\Contracts\Http\Requests\Settings\Subscription\CreateSubscriptionRequest as Contract;

class CreateBraintreeSubscriptionRequest extends CreateSubscriptionRequest implements Contract
{
    /**
     * Get the validator for the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validator()
    {
        $validator = Validator::make($this->all(), [
            'braintree_type' => 'required',
            'braintree_token' => 'required',
            'plan' => 'required|in:'.Spark::activePlanIdList()
        ]);

        return $validator->after(function ($validator) {
            $this->validatePlanEligibility($validator);

            if ($this->coupon) {
                $this->validateCoupon($validator);
            }
        });
    }
}
