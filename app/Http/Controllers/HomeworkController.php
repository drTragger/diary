<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GetMarksRequest;
use App\Http\Requests;
use App\Http\Services\HomeworkService;

class HomeworkController extends Controller
{
    protected $homeworkService;

    public function __construct(HomeworkService $service)
    {
        $this->homeworkService = $service;
    }

    public function getMarks(GetMarksRequest $request)
    {
        $user = $request->user();
        return view('homework.marks', ['user' => 'john']);
        //$this->homeworkService->getMarks($request->groupId)
    }

    public function getMark(Request $request)
    {
        $user = $request->user();
        return view('homework.marks', ['marks' => $this->homeworkService->getMark($user->id)]);
    }
}
