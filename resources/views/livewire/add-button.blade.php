<div class="flex justify-between items-center mb-1 py-1">
    <x-jet-button class="float-left md:float-left" wire:click.prevent="$emitTo('add-form','openForm', 'new')">
        {{ __('system.create_new_file') }}
    </x-jet-button>
</div>
