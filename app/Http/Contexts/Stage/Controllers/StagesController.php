<?php

namespace App\Http\Contexts\Stage\Controllers;

use App\Domain\Stage\Handlers\CreateStageHandler;
use App\Domain\Stage\Query\GetStagesForRecipeQuery;
use App\Http\Contexts\Stage\Requests\CreateStageRequest;
use App\Http\Contexts\Stage\Requests\IndexStageRequest;
use App\Http\Contexts\Stage\Resources\StageCollection;
use App\Http\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Infrastructure\Helpers\ResponseHelper as RH;

class StagesController extends Controller
{
    public function store(CreateStageRequest $request, CreateStageHandler $handler)
    {
        $payload = $request->validated();
        $payload['user'] = Auth::user();
        $payload = collect($payload)->transformKeys(fn ($key) => Str::camel($key));

        $stage = $handler->call(...$payload);

        return RH::json(['id' => $stage->id], status: 201);
    }

    public function index(IndexStageRequest $request, GetStagesForRecipeQuery $query)
    {
        $payload = $request->validated();
        $payload['user'] = Auth::user();
        $payload = collect($payload)->transformKeys(fn ($key) => Str::camel($key));

        $result = $query->call(...$payload);
        return RH::json(new StageCollection($result));
    }
}
