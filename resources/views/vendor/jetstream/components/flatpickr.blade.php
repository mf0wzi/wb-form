@props(['options' => "{dateFormat:'Y-m-d', altFormat:'F j, Y', altInput:false, }"])

<div class="flatpickr" wire:ignore>
    <input
        x-data
        x-init="flatpickr($refs.input, {{ $options }} );"
        x-ref="input"
        type="text"
        data-input
        data-id="{{ $attributes['id'] }}"
        {{ $attributes->merge(['class' => 'block w-full disabled:bg-gray-200 p-2 border border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5']) }}
    />
    <a class="input-button" title="toggle" data-toggle>
        <i class="icon-calendar"></i>
    </a>

    <a class="input-button" title="clear" data-clear>
        <i class="icon-close"></i>
    </a>
</div>
