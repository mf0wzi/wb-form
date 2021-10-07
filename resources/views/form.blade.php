<x-app-layout>
    <x-slot name="header">
        <h2 dir="{{ __('system.localization') }}" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('navigations.form') }}
        </h2>
    </x-slot>

    <div dir="{{ __('system.localization') }}" class="py-12 mb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:wbr-forms wire:key="'wbr-forms-'.{{ $user_id }}.{{ now() }}" />
            </div>
        </div>
    </div>
</x-app-layout>
