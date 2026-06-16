<?php

namespace App\Livewire\Frontend;

use App\Models\Career as CareerModel;
use App\Models\JobApplication;
use Livewire\Component;
use Livewire\WithFileUploads;

class Career extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $resume;
    public $career_id;

    public function apply()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'resume' => 'required|mimes:pdf,doc,docx|max:5120',
            'career_id' => 'required|exists:careers,id',
        ]);

        $resumePath = $this->resume->store('resumes', 'public');

        JobApplication::create([
            'career_id' => $this->career_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'resume' => $resumePath,
            'status' => 'New',
        ]);

        $this->reset(['name', 'email', 'phone', 'resume', 'career_id']);

        session()->flash('success', 'Your application has been submitted successfully.');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        $careers = CareerModel::where('status', 'Active')->latest()->get();
        return view('livewire.frontend.career', compact('careers'))->layout('components.layouts.app');
    }
}
