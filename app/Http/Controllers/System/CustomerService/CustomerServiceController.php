<?php

namespace App\Http\Controllers\System\CustomerService;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\CustomerService\CustomerServiceMessageRequest;
use App\Services\System\CustomerService\CustomerServiceService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Livewire\Component;

class CustomerServiceController extends Controller
{
    public function __construct(private CustomerServiceService $service) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerServiceMessageRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $this->service->store($validatedData);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->service->destroy($id);
        return redirect()->back();
    }
}