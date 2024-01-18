<x-layout>
    
    <x-card class="mb-4 text-sm">Filters
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>1</div>
            <div>2</div>
            <div>3</div>
        </div>
    </x-card>

    @foreach ($jobs as $job)
        <x-job-card :job="$job">
            <x-link-button :href="route('jobs.show', $job)">
                Learn More
            </x-link-button>
        </x-job-card>
    @endforeach
</x-layout>