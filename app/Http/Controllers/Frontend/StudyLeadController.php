<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudyLead;

class StudyLeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'class' => 'nullable|string|max:255',
            'stream' => 'nullable|string|max:255',
        ]);

        StudyLead::create($validated);

        // Set session flag so user can access PDFs
        session(['study_lead_verified' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Details submitted successfully.',
        ]);
    }
}
