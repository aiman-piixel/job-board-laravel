<x-layout>
    <x-card class="font-medium text-xl">
        Currently active application(s)
    </x-card>

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex items-center justify-between text-sm text-slate-500">
                <div>
                    <div>
                        Applied {{ $application->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Number Of Applicant(s) : {{ $application->job->job_applications_count }}
                    </div>
                    <div>
                        Your Asking Salary : ${{ number_format($application->expectedSalary) }}
                    </div>
                    <div>
                        Average Asking Salary : ${{ number_format($application->job->job_applications_avg_expected_salary) }}
                    </div>
                </div>
                <div>
                    <form action="{{ route('applied-job.destroy', $application) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="w-full rounded-md text-center font-semibold shadow-md text-sm border border-slate-300 py-2 px-3 hover:bg-red-300">
                            Retract Application
                        </button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <x-card class="text-sm italic">
            This section seems empty, why don't you start applying for jobs?
        </x-card>
    @endforelse
    
</x-layout>