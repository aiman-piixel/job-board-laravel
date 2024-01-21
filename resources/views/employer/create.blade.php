<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="companyName">Company Name</label>
                <input type="text" name="companyName">
            </div>
            <button class="w-full">
                Create
            </button>
        </form>
    </x-card>
</x-layout>