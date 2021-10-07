<x-admin-layout>
    <x-slot name="header">
        <h2 dir="{{ __('system.localization') }}" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('navigations.users') }}
        </h2>
    </x-slot>

    <div dir="{{ __('system.localization') }}" class="py-12 mb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-button wire:click="activate">
                    {{ __('Upload Excel') }}
                </x-jet-button>
                <livewire:users-list wire:key="'users-list-'.{{ $uuid }}.{{ now() }}"/>
            </div>
        </div>
    </div>
    <livewire:view-users wire:key="'view-users-'.{{ $uuid }}.{{ now() }}"/>
</x-admin-layout>
