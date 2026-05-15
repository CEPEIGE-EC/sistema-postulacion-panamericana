<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Correo Electrónico" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Contraseña" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" style="accent-color: #0367a6;">
                <span class="ms-2 text-sm text-gray-600">Recordar sesión</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-6">
            <button type="submit" class="w-full px-6 py-3 border border-transparent rounded-lg shadow-md text-white font-bold text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5" style="background: linear-gradient(135deg, #f3762b, #e06520);">
                INGRESAR AL SISTEMA
            </button>
        </div>
    </form>
</x-guest-layout>
