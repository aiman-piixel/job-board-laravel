<x-layout>    
    <x-job-card :job="$job">
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>

    <x-card>
        <h2 class="font-medium text-xl">Apply For The Position</h2>

        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            
            @csrf
            <div class="mt-4 mb-4">
                <label class="mb-2 block text-sm" for="expectedSalary">Expected Salary</label>
                <input class="w-full items-center rounded-md"
                    type="number" name="expectedSalary">
            </div>

            <div class="mb-4">
                <label class="mb-2 block text-sm">Upload CV</label>
                <input type="file" name="cv">
            </div>

            <button class="w-full rounded-md border border-slate-400 shadow px-2.5 py-3.5">
                Apply
            </button>
        </form>
    </x-card>
    
</x-layout>