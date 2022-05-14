<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public $projects = [];

    public function mount()
    {
        $this->projects = Project::with('sal_created_by', 'sal_skills_by.sal_skill')
            ->whereRelation("sal_skills_by.sal_skill", 'title', 'LIKE', '%' . $this->search . "%")
            ->get();
    }

    public function updated()
    {
        $this->projects = Project::with('sal_created_by', 'sal_skills_by.sal_skill')
            ->whereRelation("sal_skills_by.sal_skill", 'title', 'LIKE', '%' . $this->search . "%")
            ->get();
    }

    public function render()
    {
        return view('livewire.search', ["projects" => $this->projects]);
    }
}
