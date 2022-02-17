<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessEmailRequest;
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

    public function emailProcessor(ProcessEmailRequest $request)
    {
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
            return $this->jobProcessorService->bulkProcessEmail($request);
        }catch (\Throwable $throwable)
        {
            return $throwable;
        }
    }

    public function processFailed()
    {
        try {
            $this->jobProcessorService->pushedBackQueue();
            return 'ok';
        }catch (\Throwable $th){
            return $th;
        }
    }
}
