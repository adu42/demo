<?php

namespace Ado\Spark\Interactions\Settings\Security;

use Ado\Spark\Services\Security\Authy;
use Ado\Spark\Contracts\Interactions\Settings\Security\DisableTwoFactorAuth as Contract;

class DisableTwoFactorAuthUsingAuthy implements Contract
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
    public function handle($user)
    {
        $this->authy->disable($user->authy_id);

        $user->forceFill([
            'authy_id' => null,
        ])->save();

        return $user;
    }
}
