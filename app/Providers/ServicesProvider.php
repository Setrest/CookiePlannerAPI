<?php

namespace App\Providers;

use App\Domain\Authenticate\Contracts\AuthenticateServiceInterface;
use App\Domain\Authenticate\Services\AuthenticateService;
use App\Domain\Registration\Contracts\VerifyServiceInterface;
use App\Domain\Registration\Services\VerifyService;
use App\Domain\User\Contracts\Services\UserServiceInterface;
use App\Domain\User\Services\UserService;
use App\Services\AuthService;
use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );

        // $this->app->bind(
        //     FileServiceInterface::class,
        //     FileService::class
        // );

        $this->app->bind(
            VerifyServiceInterface::class,
            VerifyService::class
        );

        $this->app->bind(
            AuthenticateServiceInterface::class,
            AuthenticateService::class
        );
    }
}
