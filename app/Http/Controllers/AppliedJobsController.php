<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class AppliedJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'applied-jobs.index',
            [
                'applications' => auth()->user()->jobApplications()
                    ->with([
                        'job' => fn($query) => $query->withCount('jobApplications')
                            ->withAvg('jobApplications', 'expectedSalary'), 
                        'job.employer'
                        ])
                    ->latest()->get()
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $appliedJob)
    {
        $appliedJob->delete();

        return redirect()->back()->with(
            'success', 'Application deleted successfully'
        );
    }
}
