<?php

namespace Ado\Spark\Contracts\Interactions\Settings\Teams;

interface SendInvitation
{
    /**
     * Create and mail an invitation to the given e-mail address.
     *
     * @param  \Ado\Spark\Team  $team
     * @param  string  $email
     * @return \Ado\Spark\Invitation
     */
    public function handle($team, $email);
}
