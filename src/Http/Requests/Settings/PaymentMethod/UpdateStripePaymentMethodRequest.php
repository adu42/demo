<?php

namespace Ado\Spark\Http\Requests\Settings\PaymentMethod;

use Ado\Spark\Spark;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Ado\Spark\Http\Requests\ValidatesBillingAddresses;
use Ado\Spark\Contracts\Http\Requests\Settings\PaymentMethod\UpdatePaymentMethodRequest;

class UpdateStripePaymentMethodRequest extends FormRequest implements UpdatePaymentMethodRequest
{
    use ValidatesBillingAddresses;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validator for the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validator()
    {
        $validator = Validator::make($this->all(), [
            'stripe_token' => 'required',
        ]);

        if (Spark::collectsBillingAddress()) {
            $this->validateBillingAddress($validator);
        }

        return $validator;
    }
}
