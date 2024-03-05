<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('user')) {
    function user(): ?User
    {
        return Auth::user();
    }
}

if (!function_exists('userId')) {
    function userId(): ?int
    {
        return user()?->id;
    }
}
