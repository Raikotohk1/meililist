<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DanceScheduleController extends Controller
{
    public function index()
    {
        $danceSchedules = [
            'Aitab!?' => ['Tants 1', 'Tants 2'],
            'Kord sadamas' => ['Tants 3', 'Tants 4'],
            'Aafrikast Eestisse' => ['Tants 5', 'Tants 6'],
            'Juured hoiavad-siin ja praegu' => ['Tants 7', 'Tants 8'],
            'Mo käes' => ['Tants 9', 'Tants 10'],
            'Eri' => ['Tants 11', 'Tants 12'],
        ];

        return view('admin.dance-schedules.index', compact('danceSchedules'));
    }
}
