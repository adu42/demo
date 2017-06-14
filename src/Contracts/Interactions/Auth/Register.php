<?php

namespace Ado\Spark\Contracts\Interactions\Auth;

use Ado\Spark\Contracts\Http\Requests\Auth\RegisterRequest;

interface Register
{
    /**
     * Register a new user with the application.
     *
     * @param  \Ado\Spark\Http\Requests\Auth\RegisterRequest  $request
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function handle(RegisterRequest $request);
}
