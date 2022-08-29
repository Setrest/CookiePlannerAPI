<?php

namespace App\Http\Contexts\Authenticate\Controllers;

use App\Domain\Authenticate\Handlers\EmailAuthenticateHandler;
use App\Http\Contexts\Authenticate\Requests\EmailAuthenticateRequest;
use App\Http\Controller;
use App\Infrastructure\Helpers\ResponseHelper as RH;

class EmailController extends Controller
{
    public function auth(EmailAuthenticateRequest $request, EmailAuthenticateHandler $handler)
    {
        $accessToken = $handler->handle($request->email, $request->password);
        return RH::json([
            'access_token' => $accessToken
        ]);
    }
}