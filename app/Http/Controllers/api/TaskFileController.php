<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\StoreFileRequest;
use App\Http\Resources\FileResource;
use App\Services\Interfaces\FileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskFileController extends Controller
{
    private FileService $service;

    public function __construct(FileService $service)
    {
        $this->service = $service;
    }

    public function store(StoreFileRequest $request, int $taskId): AnonymousResourceCollection
    {
        return FileResource::collection($this->service->store($request, $taskId));
    }

    public function destroy(int $taskId, int $id): JsonResponse
    {
        return response()->json($this->service->destroy($taskId, $id));
    }
}
