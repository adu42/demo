<?php

namespace Ado\Spark\Http\Requests\Auth;

use Ado\Spark\Spark;
use Ado\Spark\Http\Requests\ValidatesBillingAddresses;
use Ado\Spark\Contracts\Http\Requests\Auth\RegisterRequest as Contract;

class StripeRegisterRequest extends RegisterRequest implements Contract
{
    use ValidatesBillingAddresses;

    /**
     * Get the validator for the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validator()
    {
        $validator = $this->registerValidator(['stripe_token']);

        if (Spark::collectsBillingAddress() && $this->hasPaidPlan()) {
            $this->validateBillingAddress($validator);
        }

        return $validator;
    }
}
