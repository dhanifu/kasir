<?php

namespace App\Http\Livewire;

use App\Models\Site as Model;
use Livewire\Component;

class Setting extends Component
{
    public $setting;

    protected $rules = [
        'setting.name' => 'required|string',
        'setting.address' => 'required|string'
    ];

    public function render()
    {
        return view('livewire.setting');
    }

    public function mount(Model $setting)
	{
		$this->setting = $setting->first();
	}

    public function save()
    {
        $this->validate();
        $this->setting->save();

        session()->flash('success', 'Sukses Menyimpan Pengaturan');
    }
}
