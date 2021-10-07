<div class="flex space-x-1 justify-around">
    <button wire:click="download('{{ $sentID }}', '{{ $sentUUID }}', '{{ $sentName }}')" class="p-1 text-grey-600 hover:bg-grey-600 hover:text-white rounded">
        <i class="fas fa-download fa-lg text-gray-400 hover:bg-grey-600"></i>
    </button>

    <button wire:click="upload('{{ $sentID }}', '{{ $sentUUID }}', '{{ $sentName }}')" class="p-1 text-grey-600 hover:bg-grey-600 hover:text-white rounded">
        <span class="relative inline-block ml-1">
            <i class="fas fa-upload fa-lg text-indigo-500 hover:bg-blue-200"></i>
            @if($sendFileCount > 0)
                <span class="absolute top-0 right-0 bottom-1 inline-flex items-center justify-center px-1 py-1 text-xs md:text-xs font-bold leading-none text-gray-400 transform translate-x-1/2 -translate-y-1/2 bg-indigo-200 rounded-full">{{ $sendFileCount }}</span>
            @endif
        </span>
    </button>

    <button wire:click="view({{ $sentID }}, '{{ $sentUUID }}', '{{ $sentName }}')" class="p-1 text-red-600 hover:bg-gray-600 hover:text-white rounded">
        <i class="far fa-eye fa-lg text-blue-400 hover:bg-grey-600"></i>
    </button>

    <button wire:click="edit({{ $sentID }}, '{{ $sentUUID }}', '{{ $sentName }}')" class="p-1 text-red-600 hover:bg-gray-600 hover:text-white rounded">
        <i class="far fa-edit fa-lg text-green-500 hover:bg-grey-600"></i>
    </button>
</div>
