<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return Payment::with('resident')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'resident_id' => 'required|exists:residents,id',
            'amount' => 'required|numeric',
            'type' => 'required|string|in:iuran kebersihan,iuran satpam',
            'payment_date' => 'required|date',
            'status' => 'required|string|in:lunas,belum lunas',
        ]);

        $payment = Payment::create($request->all());

        return response()->json($payment, 201);
    }
}
