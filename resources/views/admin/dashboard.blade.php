<x-admin-layout>
    <x-slot name="header">
        <h2 dir="{{ __('system.localization') }}" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('navigations.dashboard') }}
        </h2>
    </x-slot>

    <div dir="{{ __('system.localization') }}" class="py-12 mb-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-10 px-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:add-button wire:key="'add-button-'.{{ $uuid }}.{{ now() }}"/>
                <livewire:view-alls wire:key="'view-alls-'.{{ $uuid }}.{{ now() }}"/>
                <livewire:add-form wire:key="'add-from-'.{{ $uuid }}.{{ now() }}"/>
            </div>
        </div>
    </div>
    <livewire:view-users wire:key="'view-users-'.{{ $uuid }}.{{ now() }}"/>
    <livewire:view-user-files wire:key="'view-user-files-'.{{ $uuid }}.{{ now() }}"/>
</x-admin-layout>
