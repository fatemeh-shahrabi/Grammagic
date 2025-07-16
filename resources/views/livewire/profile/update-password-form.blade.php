<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section class="space-y-6 font-poppins">
    <header>
        <h2 class="text-lg font-bold text-gray-800 gradient-text text-left">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700">{{ __('Current Password') }}</label>
            <input wire:model="current_password" id="update_password_current_password" name="current_password" type="password" class="kb-input mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus-ring focus:border-indigo-500 sm:text-sm" autocomplete="current-password" placeholder="{{ __('Enter current password') }}" />
            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('current_password')" />
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-700">{{ __('New Password') }}</label>
            <input wire:model="password" id="update_password_password" name="password" type="password" class="kb-input mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus-ring focus:border-indigo-500 sm:text-sm" autocomplete="new-password" placeholder="{{ __('Enter new password') }}" />
            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('password')" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
            <input wire:model="password_confirmation" id="update_password_password_confirmation" name="password_confirmation" type="password" class="kb-input mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus-ring focus:border-indigo-500 sm:text-sm" autocomplete="new-password" placeholder="{{ __('Confirm new password') }}" />
            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white gradient-bg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hover-scale">
                {{ __('Save') }}
            </button>
            <x-action-message class="text-sm text-green-600" on="password-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>