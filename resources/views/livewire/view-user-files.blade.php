<div>
    <x-jet-dialog-modal maxWidth="2xl" class="pointer-events-none" wire:model="actionFileActivation">
        <x-slot name="title">
            {{ __('File Upload') }} - {{ $name }} - {{ $user_id }}
        </x-slot>
        <x-slot name="content">
            <div class="loading" wire:loading>
                Submit in Process...
            </div>
            <div class="mt-4">
                <livewire:file-uploads wire:key="'file-uploads-'.{{ $uuid }}.{{ now() }}" :user_id="$user_id" :uuid="$uuid" :name="$name" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-start">
                <x-jet-secondary-button wire:click.prevent="closeFileModal" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>
