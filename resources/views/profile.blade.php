<x-app-layout class="font-poppins">
    <!-- Header Section -->
    <x-slot name="header">
        <div class="flex items-center">
            <!-- Logo -->
            <img src="{{ asset('images/grammagic.png') }}" alt="Grammagic Logo" class="h-10 w-auto">
            <!-- Page Title with Gradient Text -->
            <h2 class="ml-3 text-xl font-bold gradient-text">{{ __('Profile') }}</h2>
        </div>
    </x-slot>

    <!-- Styles -->
    <style>
        /* Gradient text for headings */
        .gradient-text {
            background: linear-gradient(45deg, #4F46E5, #10B981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        /* Gradient background for buttons or elements */
        .gradient-bg {
            background: linear-gradient(135deg, #4F46E5 0%, #10B981 100%);
        }
        /* Smooth hover scaling effect */
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
        /* Poppins font for the layout */
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
        /* Card hover effect with shadow */
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        /* Focus ring for inputs */
        .focus-ring {
            transition: all 0.3s ease;
        }
        .focus-ring:focus {
            ring: 2px solid #4F46E5;
            outline: none;
        }
    </style>

    <!-- Main Content -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- User Information Card -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-xl card-hover animate__animated animate__fadeIn">
                <div class="flex items-center mb-6">
                    <!-- User Initial Circle -->
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                        <span class="text-2xl font-bold text-indigo-600">
                            {{ substr(auth()->user()->name ?? 'User', 0, 1) }}
                        </span>
                    </div>
                    <!-- User Name and Email -->
                    <div class="ml-4">
                        <h2 class="text-2xl font-bold gradient-text">{{ auth()->user()->name ?? 'User' }}</h2>
                        <p class="text-gray-600">{{ auth()->user()->email ?? 'No email provided' }}</p>
                    </div>
                </div>
            </div>

            <!-- Update Profile Information Card -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-xl card-hover animate__animated animate__fadeIn">
                <div class="max-w-xl">
                    <!-- Livewire component for updating profile info -->
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <!-- Update Password Card -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-xl card-hover animate__animated animate__fadeIn">
                <div class="max-w-xl">
                    <!-- Livewire component for updating password -->
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-xl card-hover animate__animated animate__fadeIn">
                <div class="max-w-xl">
                    <!-- Livewire component for deleting user account -->
                    <livewire:profile.delete-user-form />
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
