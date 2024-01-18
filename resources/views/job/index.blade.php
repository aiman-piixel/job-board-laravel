<x-layout>
    <div class="mb-4 mx-4">
        <textarea class="flex w-full p-2 resize-none rounded-md" name="" id="" cols="30" rows="10"></textarea>
    </div>

    @foreach ($jobs as $job)
        <x-card class="mb-4 mx-4">
            <div class="mb-4 flex justify-between">
                <h2 class="text-lg font-medium">{{ $job->title }}</h2>
                <div class="text-slate-500">${{ number_format($job->salary) }}</div>
            </div>

            <div class="mb-4 flex items-center justify-between text-slate-500">
                <div class="flex space-x-4">
                    <div>Company Name</div>
                    <div>{{ $job->location }}</div>
                </div>
                <div class="flex space-x-1 text-xs">
                    <x-tag>{{ $job->experience }}</x-tag>
                    <x-tag>{{ $job->category }}</x-tag>
                </div>
            </div>

            <p class="text-sm text-slate-500">
                {!! nl2br(e($job->description)) !!}
            </p>

            <div class="mt-2">
                <a href="{{ route('jobs.show', $job) }}">
                Learn More
                </a>
            </div>

        </x-card>
    @endforeach
</x-layout>