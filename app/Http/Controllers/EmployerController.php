<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }

    public function create()
    {
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        auth()->user()->employer()->create(
            $request->validate([
                'companyName' => 'required|min:3|unique:employers,companyName'
            ])
        );

        return redirect()->route('jobs.index')
            ->with('success', 'Your employer account has been created');
    }
}
