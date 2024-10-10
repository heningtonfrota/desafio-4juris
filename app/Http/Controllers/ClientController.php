<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $clients = Client::get();
        return response()->json(['clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $data = $request->validated();
        Client::create($data);
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client) : JsonResponse
    {
        return response()->json(['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client)
    {
        $data = $request->validated();
        $client->update($data);
        return $this->show($client);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return $this->index();
    }
}
