<?php

namespace App\Domain\Authenticate\Services;

use App\Domain\Authenticate\Contracts\AuthenticateServiceInterface;
use App\Models\User;
use DateTimeImmutable;
use Error;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Bridge\RefreshToken;
use Laravel\Passport\Passport;
use Laravel\Passport\RefreshTokenRepository;
use TypeError;

class AuthenticateService implements AuthenticateServiceInterface
{
    public function authByCredentials(string $email, string $password): string
    {
        if (!Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            throw new Exception('Auth error!', 401);
        }

        return $this->auth(User::whereEmail($email)->first());
    }

    public function auth(User $user, string $tokenName = 'AuthToken'): string
    {
        // $rte = app(RefreshToken::class);
        // dd($rte);
        /**
         * @var \Laravel\Passport\RefreshTokenRepository
         */
        $rtr = app(RefreshTokenRepository::class);

        $personalAccessToken = $user->createToken($tokenName);

        Passport::refreshToken()->create([
            'id' => $this->generateUniqueIdentifier(),
            'access_token_id' => $personalAccessToken->token->id,
            'revoked' => false,
            'expires_at' => (new DateTimeImmutable())->add(Passport::refreshTokensExpireIn()),
        ]);

        return $personalAccessToken->accessToken;
    }

    /**
     * Generate a new unique identifier.
     *
     * @param int $length
     *
     * @throws OAuthServerException
     *
     * @return string
     */
    protected function generateUniqueIdentifier($length = 40)
    {
        try {
            return \bin2hex(\random_bytes($length));
        } catch (TypeError $e) {
            throw new Exception('An unexpected error has occurred', 500, $e);
        } catch (Error $e) {
            throw new Exception('An unexpected error has occurred', 500, $e);
        } catch (Exception $e) {
            // If you get this message, the CSPRNG failed hard.
            throw new Exception('Could not generate a random string', 500, $e);
        }
    }
}
