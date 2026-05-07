<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudyLead;

class StudyLeadController extends Controller
{
    public function index()
    {
        $leads = StudyLead::latest()->paginate(15);
        return view('admin.study-leads.index', compact('leads'));
    }

    public function destroy(StudyLead $studyLead)
    {
        $studyLead->delete();
        return redirect()->route('admin.study-leads.index')->with('success', 'Study lead deleted successfully.');
    }
}
