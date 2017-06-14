<?php

namespace Ado\Spark\Contracts\Interactions\Auth;

interface CreateUser
{
    /**
     * Get a validator instance for the request.
     *
     * @param  \Ado\Spark\Http\Requests\Auth\RegisterRequest  $request
     * @return \Illuminate\Validation\Validator
     */
    public function validator($request);

    /**
     * Create a new user instance in the database.
     *
     * @param  \Ado\Spark\Http\Requests\Auth\RegisterRequest  $request
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function handle($request);
}
