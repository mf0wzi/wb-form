<div>
    <form wire:submit.prevent="save">
        <div dir="{{ __('system.localization') }}" class="py-10 md:py-10 mb-8">
            <div
                x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <div class="py-10 bg-gray-300 px-2">
                    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                        <div class="md:flex">
                            <div class="w-full">
                                <div class="loading" wire:loading>
                                    Submit in Process...
                                </div>
                                <div class="p-4 border-b-2"> <span class="text-lg font-bold text-gray-600">{{ __('files.add_documents') }} - {{ $name }} - {{ $user_id }}</span>
                                </div>
                                <div class="p-3">
                                    @if($count < 11)
                                    <div class="mb-2"> <span>{{ __('files.attachments') }}</span>
                                        <div class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                                            <div class="absolute">
                                                <div class="flex flex-col items-center ">

                                                    @if ($photo)
                                                        <span>{{ $photo->getClientOriginalName() }}</span>
                                                        {{--                                                    <img class="w-1/5" src="{{ $photo->temporaryUrl() }}">--}}
                                                    @else
                                                        <i class="fas fa-cloud-upload-alt fa-3x text-gray-200"></i>
                                                        <span class="block text-gray-400 font-normal">{{ __('files.attach_file_here') }}</span>
                                                        <span class="block text-gray-400 font-normal">{{ __('files.or') }}</span>
                                                    @endif
                                                    <span class="block text-blue-400 font-normal">{{ __('files.browse_files') }}</span>
                                                </div>
                                            </div>
                                            {{--                                        <input type="file" class="h-full w-full opacity-0" name="">--}}
                                            <x-jet-input type="file" name="photo" wire:model="photo" wire:loading.attr="disabled" class="h-full w-full opacity-0"/>
                                        </div>
                                        <div x-show="isUploading">
                                            <progress max="100" x-bind:value="progress"></progress>
                                        </div>
                                        <div class="flex justify-between items-center text-gray-400">
                                            <span>{{ __('files.accepted_file_type') }}: jpg,jpeg,png,gif,doc,docx,pdf. {{ __('files.only') }}</span>
                                            <span class="flex items-center "><i class="fas fa-lock mr-1"></i> {{ __('files.secure') }}</span>
                                        </div>
                                        <div class="flex justify-between items-center text-red-400">
                                            <span> @error('photo') <span class="error">{{ $message }}</span> @enderror</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center pb-3">
                                        <button type="submit" class="w-full h-12 text-lg w-32 bg-blue-600 rounded text-white hover:bg-blue-700">{{ __('files.save') }}</button>
                                    </div>
                                    @endif
                                    <div class="mt-3 text-center pb-3">
                                        <livewire:user-file-uploads wire:key="'user-file-uploads-'.{{ now() }}" :user_id="$user_id" :uuid="$uuid"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
