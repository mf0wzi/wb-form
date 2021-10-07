<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\District;
use Livewire\Component;

class Dropdowns extends Component
{
    public $city;
    public $districts=[];
    public $district;

    public function mount($city, $district)
    {
        $this->city=$city;
        $this->district=$district;
    }

    public function render()
    {
        if(!empty($this->city)) {
            $this->districts = District::where('city_id', $this->city)->get();
        }
        return view('livewire.dropdowns')
            ->withCities(City::orderBy('city_name')->get());
    }
}
