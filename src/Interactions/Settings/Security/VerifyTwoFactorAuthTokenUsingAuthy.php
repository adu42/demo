<?php

namespace Ado\Spark\Interactions\Settings\Security;

use Ado\Spark\Services\Security\Authy;
use Ado\Spark\Contracts\Interactions\Settings\Security\VerifyTwoFactorAuthToken as Contract;

class VerifyTwoFactorAuthTokenUsingAuthy implements Contract
{
    /**
     * The Authy service instance.
     *
     * @var \Ado\Spark\Services\Security\Authy
     */
    protected $authy;

    /**
     * Create a new interaction instance.
     *
     * @param  \Ado\Spark\Services\Security\Authy  $authy
     * @return void
     */
    public function __construct(Authy $authy)
    {
        $this->authy = $authy;
    }

    /**
     * {@inheritdoc}
     */
    public function handle($user, $token)
    {
        return $this->authy->verify($user->authy_id, $token);
    }
}
