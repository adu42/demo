<?php

namespace Ado\Spark\Http\Requests\Auth;

use Ado\Spark\Contracts\Http\Requests\Auth\RegisterRequest as Contract;

class BraintreeRegisterRequest extends RegisterRequest implements Contract
{
    /**
     * Get the validator for the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validator()
    {
        return $this->registerValidator(['braintree_type', 'braintree_token']);
    }
}
