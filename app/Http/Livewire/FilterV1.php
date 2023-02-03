<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Statamic\Facades\Entry;
use Illuminate\Support\Carbon;

class FilterV1 extends Component
{
    public $aktuell = true;

    public $selection = [];
    public $collectionType;
    public $filterTax;
    public $currentLocale;

    public function mount($config)
    {
        debug($config);
        $this->collectionType = $config["collectionType"];
        $this->filterTax = $config["tax"];
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

        // debug(Entry::query()
        // ->where('collection', $this->collectionType)
        // ->where('status', 'published'));
        // debug(Entry::query()
        // ->where('collection', $this->collectionType)
        // ->where('status', 'published')
        // ->where('locale', $this->currentLocale)
        // ->where('aktuell', false)
        // ->get());

        $query = Entry::query()
            ->where('collection', $this->collectionType)
            ->where('status', 'published')
            ->where('locale', $this->currentLocale)
            
            ->whereDate('date', '>=', Carbon::parse('today'));
            // ->where('aktuell', $this->aktuell);

        $results = $query->get();

        if (count($this->selection) > 0) {
            $results = $results
                ->filter(function ($el) {
                    $taxoTerms = $el->get($this->filterTax);
                    return $this->checkHayStackForAllElements($this->selection, $taxoTerms);
                });
        }

        debug($query->get());
        debug($results);
        debug("selection", $this->selection);

        return view('livewire.filter-v1',  ['lwResults' => $results]);
    }
}
