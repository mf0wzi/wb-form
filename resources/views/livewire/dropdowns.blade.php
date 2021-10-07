<div>
    <div class="mb-8">
        <x-jet-label for="city" class="block text-sm font-medium text-gray-700">{{__('forms.city', ['extra'=>'*'])}}</x-jet-label>
        <select id="city" name="city" wire:model="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <option value=''>Choose a city</option>
            @foreach($cities as $city)
                <option value={{ $city->id }}>{{ $city->city_name_ar }}</option>
            @endforeach
        </select>
    </div>
    @if(count($districts) > 0)
        <div class="mb-8">
            <x-jet-label for="city" class="block text-sm font-medium text-gray-700">{{__('forms.district', ['extra'=>'*'])}}</x-jet-label>
            <select id="district" name="district" wire:model="district"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <option value=''>Choose a District</option>
                @foreach($districts as $district)
                    <option value={{ $district->id }}>{{ $district->district_name_ar }}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>
