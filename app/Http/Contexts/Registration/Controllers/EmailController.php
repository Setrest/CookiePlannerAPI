<?php

namespace App\Http\Contexts\Registration\Controllers;

use App\Domain\Registration\Handlers\EmailRegistrationHandler;
use App\Http\Contexts\Registration\Requests\CreateEmailRegistrationRequest;
use App\Http\Contexts\Registration\Resources\RegistrationResource;
use App\Http\Controller;

class EmailController extends Controller
{
    public function create(CreateEmailRegistrationRequest $request, EmailRegistrationHandler $handler)
    {
        $user = $handler->handle($request->email, $request->password);
        return response()->json(new RegistrationResource($user), 201);
    }
}
