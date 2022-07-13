<?php

namespace App\Http\Contexts\Schedule\Controllers;

use App\Domain\Schedule\Handlers\CreateScheduleRecordHandler;
use App\Domain\Schedule\Query\GetScheduleQuery;
use App\Http\Contexts\Schedule\Requests\CreateScheduleRequest;
use App\Http\Contexts\Schedule\Requests\IndexScheduleRequest;
use App\Http\Contexts\Schedule\Resources\ScheduleCollection;
use App\Http\Controller;
use App\Infrastructure\Helpers\ResponseHelper as RH;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{

    public function index(IndexScheduleRequest $request, GetScheduleQuery $query)
    {
        $payload = [
            'user' => Auth::user(),
            'from_date' => Carbon::parse($request->from_date),
            'to_date' => Carbon::parse($request->to_date),
        ];
        $payload = collect($payload)->transformKeys(fn ($key) => Str::camel($key));

        $data = $query->get(...$payload);
        return RH::json(new ScheduleCollection($data));
    }

    public function store(CreateScheduleRequest $request, CreateScheduleRecordHandler $handler)
    {
        $payload = $request->validated();
        $payload['user'] = Auth::user();
        $payload['date'] = Carbon::parse($request->date);
        
        $payload = collect($payload)->transformKeys(fn ($key) => Str::camel($key));

        $schedule = $handler->handle(...$payload);
        return RH::json(['id' => $schedule->id], 'Schedule created!', 201);
    }
}
