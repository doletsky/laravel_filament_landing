<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use App\Models\Subscription;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Получаем все активные элементы лендинга, отсортированные по секциям и порядку
        $landings = Landing::where('is_active', true)
            ->orderBy('section_key')
            ->orderBy('order')
            ->get()
            ->groupBy('section_key');

        return view('landing', ['landings' => $landings]);
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        Subscription::create([
            'email' => $validated['email'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'active',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Спасибо! Ваш email добавлен в лист ожидания.',
        ], 201);
    }
}
