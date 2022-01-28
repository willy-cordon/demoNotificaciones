<?php

namespace App\Http\Controllers;

use App\Services\JobProcessorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JobProcessorController extends Controller
{
    protected $jobProcessorService;
    public function __construct(JobProcessorService $jobProcessorService)
    {
        $this->jobProcessorService = $jobProcessorService;
    }

    public function emailProcessor(Request $request)
    {
        Log::debug($request);
        try {
            $this->jobProcessorService->processEmail($request);
            return response($request->name.' - successful process');

        }catch (\Throwable $throwable)
        {
            return $throwable;
        }
    }

    public function bulkProcessorEmail(Request $request)
    {
        try {
            $this->jobProcessorService->bulkProcessEmail($request);
        }catch (\Throwable $throwable)
        {
            return $throwable;
        }
    }
}
