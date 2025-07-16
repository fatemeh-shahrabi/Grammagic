<x-app-layout class="font-poppins">
    <x-slot name="header">
        <div class="flex items-center">
            <img src="{{ asset('images/grammagic.png') }}" alt="Grammagic Logo" class="h-10 w-auto">
            <h2 class="ml-3 text-xl font-bold gradient-text">{{ __('Profile') }}</h2>
        </div>
    </x-slot>

    <style>
        .gradient-text {
            background: linear-gradient(45deg, #4F46E5, #10B981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #4F46E5 0%, #10B981 100%);
        }
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .focus-ring {
            transition: all 0.3s ease;
        }
        .focus-ring:focus {
            ring: 2px solid #4F46E5;
            outline: none;
        }
    </style>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- User Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-xl card-hover animate__animated animate__fadeIn">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                        <span class="text-2xl font-bold text-indigo-600">{{ substr(auth()->user()->name ?? 'User', 0, 1) }}</span>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-2xl font-bold gradient-text">{{ auth()->user()->name ?? 'User' }}</h2>
                        <p class="text-gray-600">{{ auth()->user()->email ?? 'No email provided' }}</p>
                    </div>
                </div>
            </div>

            <!-- Update Profile Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-xl card-hover animate__animated animate__fadeIn">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-xl card-hover animate__animated animate__fadeIn">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-xl card-hover animate__animated animate__fadeIn">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>