<?php

namespace App\Http\Controllers\System\CustomerService;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\CustomerService\CustomerServiceMessageRequest;
use App\Services\System\CustomerService\CustomerServiceService;
use Illuminate\Http\Request;
use Livewire\Component;

class CustomerServiceController extends Controller
{
    public function __construct(private CustomerServiceService $service) {}

    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerServiceMessageRequest $request)
    {
        $validatedData = $request->validated();
        $data = $this->service->store($validatedData);
        return  redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}