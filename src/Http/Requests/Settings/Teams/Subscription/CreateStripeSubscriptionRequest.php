<?php

namespace Ado\Spark\Http\Requests\Settings\Teams\Subscription;

use Ado\Spark\Spark;
use Ado\Spark\Http\Requests\ValidatesBillingAddresses;
use Ado\Spark\Contracts\Http\Requests\Settings\Teams\Subscription\CreateSubscriptionRequest as Contract;

class CreateStripeSubscriptionRequest extends CreateSubscriptionRequest implements Contract
{
    use ValidatesBillingAddresses;

    /**
     * Get the validator for the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validator()
    {
        $validator = $this->baseValidator([
            'stripe_token' => 'required',
            'vat_id' => 'nullable|max:50|vat_id',
        ]);

        if (Spark::collectsBillingAddress()) {
            $this->validateBillingAddress($validator);
        }

        return $validator;
    }
}
