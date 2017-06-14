<?php

namespace Ado\Spark\Contracts\Interactions\Settings\Teams;

interface CreateTeam
{
    /**
     * Get a validator instance for the given data.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $data
     * @return \Illuminate\Validation\Validator
     */
    public function validator($user, array $data);

    /**
     * Create a new team.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $data
     * @return \Ado\Spark\Team
     */
    public function handle($user, array $data);
}
