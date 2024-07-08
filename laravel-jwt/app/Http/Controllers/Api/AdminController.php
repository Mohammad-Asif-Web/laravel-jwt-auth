<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller {
    public function getUserCounts() {
        $playerCount = User::where('role', 'player')->where('status', '1')->count();
        $coachCount  = User::where('role', 'coach')->where('status', '1')->count();
        $parentCount = User::where('role', 'parent')->where('status', '1')->count();

        return response()->json([
            'players' => $playerCount,
            'coaches' => $coachCount,
            'parents' => $parentCount,
        ]);
    }
}
