<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Statamic\Facades\Entry;

class ProgrammFilter extends Component
{
    public $aktuell = true;

    public $selection = [];
    public $type;
    public $filterTax;
    public $currentLocale;

    public function mount($config)
    {
        // debug($config);

        if(!isset($config["type"])) return;
        $this->type = $config["type"];

        if(!isset($config["tax"])) return;
        $this->filterTax = $config["tax"];

        if(!isset($config["currLocale"])) return;
        $this->currentLocale = $config["currLocale"];

        if(isset($config["preselection"])) {
            $this->selection = $config["preselection"];
        }
    }

    public function checkHayStackForAllElements($needleArray, $hayStack)
    {
        if (!($needleArray && $hayStack)) return;

        $needleLength = count($needleArray);
        $intersectLength = count(array_intersect($needleArray, $hayStack));

        if ($needleLength == $intersectLength) return true;
    }

    public function render()
    {
        $query = Entry::query()
            // ->where('collection', $this->collectionType)
            ->where('status', 'published')
            ->where('locale', $this->currentLocale)
            ->where('aktuell', $this->aktuell)
            ->orderBy('title', 'asc');

        switch ($this->type) {
            case 'reihen':
                $query = $query->where('collection', 'reihen');
                break;
            case 'programme':
                $query = $query
                ->where('collection', 'programme')
                ->where('select_type', 'programm');
                break;
            case 'education':
                $query = $query  
                ->where('collection', 'programme')
                ->where('select_type', 'education');
                break;
            
            default:
                $query = $query->where('collection', 'programme');
                break;
        }

        $results = $query->get();

        if (count($this->selection) > 0) {
            $results = $results
                ->filter(function ($el) {
                    $taxoTerms = $el->get($this->filterTax);
                    return $this->checkHayStackForAllElements($this->selection, $taxoTerms);
                });
        }

        $featueSortedResults = $results->sortByDesc('featured');

        // debug($query->get());
        // debug("resuts");
        // debug($results->pluck('title'));

        // debug("sorted featured");
        // debug($featueSortedResults->pluck('title'));
        // debug("selection", $this->selection);

        return view('livewire.programm-filter',  ['lwResults' => $featueSortedResults]);
    }
}

