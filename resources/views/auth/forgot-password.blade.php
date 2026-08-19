<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('رمز عبور خود را فراموش کرده‌اید؟ نگران نباشید. کافی است آدرس ایمیل خود را وارد کنید تا لینک بازیابی رمز عبور برای شما ارسال شود.') }}
    </div>

    @if(session('status'))
        <div class="mb-4 text-sm text-green-600">
            لینک بازیابی رمز عبور برای شما ارسال شد.
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 text-sm text-red-600">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-4 text-sm text-red-600">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('ایمیل')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('ارسال لینک بازیابی') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
