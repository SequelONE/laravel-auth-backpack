<?php

namespace App\Support;

use PragmaRX\Google2FALaravel\Support\Authenticator;
use PragmaRX\Google2FALaravel\Exceptions\InvalidSecretKey;
use App\Http\Controllers\LoginSecurityController;

class Google2FAAuthenticator extends Authenticator
{
    protected function canPassWithoutCheckingOTP()
    {
        if($this->getUser()->loginSecurity === NULL || $this->getUser()->recoveryCode === NULL) {
            return true;
        } else {
            return
                !$this->getUser()->loginSecurity->two_factor_auth_enable ||
                !$this->isEnabled() ||
                $this->noUserIsAuthenticated() ||
                $this->twoFactorAuthStillValid();
        }
    }

    protected function getGoogle2FASecretKey()
    {
        $secret = $this->getUser()->loginSecurity->two_factor_auth_secret;

        if (empty($secret)) {
            throw new InvalidSecretKey('Secret key cannot be empty.');
        }

        return $secret;
    }

    /**
     * Decrypt the user's 2fa secret, if they have one
     *
     * @param string|null $value
     * @return string|null
     */
    public function getGoogle2faSecretAttribute(?string $value): ?string {
        return ($value)
            ? decrypt($value)
            : null;
    }

}
