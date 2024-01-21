<x-layout>
    <h1 class="text-center font-semibold text-4xl my-16">
        Sign in to your account
    </h1>

    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-8">
                <label for="email" class="mb-2 block text-sm">E-mail</label>
                <input class="w-full rounded-md" name="email">
            </div>

            <div class="mb-8">
                <label for="password" class="mb-2 block text-sm">Password</label>
                <input class="w-full rounded-md" name="password" type="password">
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div>
                    <div class="flex items-center space-x-1">
                        <input type="checkbox" name="remember-me" class="rounded-md border border-slate-400">
                        <label for="remember-me">Remember Me</label>
                    </div>
                </div>
                <div>
                    <a href="#" class="hover:underline">Forgot Your Password?</a>
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="w-full rounded-md text-center font-semibold shadow-md text-sm border border-slate-300 py-2 px-3 hover:bg-slate-100">
                    Login
                </button>
            </div>
        </form>
    </x-card>
</x-layout>