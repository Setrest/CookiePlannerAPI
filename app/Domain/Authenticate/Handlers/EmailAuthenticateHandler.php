<?php

namespace App\Domain\Authenticate\Handlers;

use App\Domain\Authenticate\Contracts\AuthenticateServiceInterface;
use App\Services\Interfaces\AuthServiceInterface;
use GuzzleHttp\Client;

class EmailAuthenticateHandler
{
    private $authService;

    public function __construct(AuthenticateServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function handle(string $email, string $password)
    {
        return $this->authService->authByCredentials($email, $password);
    }
}