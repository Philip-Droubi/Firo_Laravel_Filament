<?php

namespace App\Http\Controllers;

use App\Services\Administration\Auth\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class AdminAuthController extends Controller
{
    public function __construct(private AuthService $authService) {}

    public function logoutAll(): RedirectResponse
    {
        $this->authService->logoutAll();
        return redirect('/admin/login');
    }
}
