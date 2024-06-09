<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Petugas Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-2xl">{{ __('Welcome to the Housing Complaint Dashboard') }}</h3>
                    <p class="text-lg">
                        {{ __('This dashboard allows you to manage and track complaints from residents.') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
