<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    use ApiResponseTrait;

    /**
     * Store a newly created resource in storage.
     * @return JsonResponse
    */
    public function getNotification():JsonResponse
    {
        $notification = Notification::where('notifiable_id', Auth::user()->id)->get();

        return $this->successResponse('Notification fetched', $notification, 200);
    }
}
