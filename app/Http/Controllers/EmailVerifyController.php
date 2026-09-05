<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.verify-email');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Link de verificação enviado!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('home.index');
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
