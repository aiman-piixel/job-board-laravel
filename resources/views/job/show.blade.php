<x-layout>
    <x-breadcrumb class="mx-4 mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']"/>
    <x-job-card :job="$job">
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>
</x-layout>