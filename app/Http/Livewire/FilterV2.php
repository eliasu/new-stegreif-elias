<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Statamic\Facades\Entry;

class FilterV2 extends Component
{
    // looks like this need to be defined in php to be able to pass properties in antlers
    public $nice;

    public $past = false;
    public $selection;

    public $collectionType;
    public $filterTax;
    public $currentLocale;

    public function mount($config)
    {
        debug($config);
        $this->collectionType = $config["collectionType"];
        $this->filterTax = $config["tax"];
        $this->currentLocale = $config["currLocale"];
    }

    public function render()
    {

        $query = Entry::query()
            ->where('collection', $this->collectionType)
            ->where('status', 'published')
            ->where('locale', $this->currentLocale);

        $results = $query
            ->get()
            ->filter(function ($el) {
                // return true is like continue
                // if nothing selected just give all items
                if (strlen($this->selection) == 0) return true;

                $taxoTerms = $el->get($this->filterTax);
                // return true is like break
                // if element has no terms break
                if (!$taxoTerms) return false;
                
                // filter elements
                return in_array($this->selection, $taxoTerms);
            })
            // ->orderBy('date', 'desc')
        ;


        debug($query->get());
        debug($results);
        debug("selection", $this->selection);

        return view('livewire.filter-v1',  ['lwResults' => $results]);
    }
}
