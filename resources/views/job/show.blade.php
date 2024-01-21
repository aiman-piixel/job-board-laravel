<x-layout>
    <x-breadcrumb class="mx-4 mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']"/>
    <x-job-card :job="$job">
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>

        @can('apply', $job)
            <x-link-button :href="route('job.application.create', $job)">
                Apply For The Position
            </x-link-button>    
        @else
            <div class="text-center text-sm font-medium text-slate-500">
                You already applied for the job!
            </div>    
        @endcan

        
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More open position(s) in {{ $job->employer->companyName }}
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ( $job->employer->jobs as $otherJob)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('jobs.show', $otherJob) }}">
                                {{ $otherJob->title }}
                            </a>
                        </div>
                        <div class="text-sm">
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-sm">
                        ${{ number_format($otherJob->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>