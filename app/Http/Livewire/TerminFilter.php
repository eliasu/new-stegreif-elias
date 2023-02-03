<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Statamic\Facades\Entry;
use Illuminate\Support\Carbon;

class TerminFilter extends Component
{
    public bool $aktuell = true;

    public string $selection = "";
    public string $type;
    public string $filterTax;
    public string $currentLocale;

    public function mount(array $config):void 
    {
        debug($config);

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

    public function checkHayStackForAllElements(array $needleArray, $hayStack)
    {
       
        if (!($needleArray && $hayStack)) return;

        $needleLength = count($needleArray);
        $intersectLength = count(array_intersect($needleArray, $hayStack));

        if ($needleLength == $intersectLength) return true;
    }

    public function render()
    {
        $query = Entry::query()
            ->where('collection', $this->type)
            ->where('status', 'published')
            ->where('locale', $this->currentLocale)
            ;

        if($this->aktuell) {
            $query = $query
            ->whereDate('date_field', '>=', Carbon::parse('today'))
            ->orderBy('date_field', 'asc');
        } else {
            $query = $query
            ->whereDate('date_field', '<=', Carbon::parse('today'))
            ->orderBy('date_field', 'desc');
        }
            
        $results = $query->get();

        if (strlen($this->selection) > 0) {
            $results = $results
                ->filter(function ($el) {
                    $taxoTerms = $el->get($this->filterTax);
                    return $this->checkHayStackForAllElements([$this->selection], $taxoTerms);
                });
        }

        debug($query->get());
        debug($results);
        debug("selection", $this->selection);

        return view('livewire.termin-filter',  ['lwResults' => $results]);
    }
}

