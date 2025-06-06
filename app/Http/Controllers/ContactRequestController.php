<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:strict,dns',
            'phone' => 'nullable|numeric',
            'message' => 'required|string',
            'consent' => 'required|boolean|accepted',
        ]);

        $contact = ContactRequest::create($request->all());

        return response()->json($contact, 201);
    }
}
