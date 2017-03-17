<?php

namespace Sway\Component\Filter;

use Sway\Component\Dependency\DependencyInterface;

class FilterContainer extends DependencyInterface
{
    /**
     * Array which contains filters objects
     * @var array
     */
    private $filters = null;
    
    public function __construct() 
    {
        /**
         * if field 'filters' is empty (is null). Creates an empty array
         */
        if (empty($this->filters)){
            $this->filters = array();
        }
    }
    
    protected function dependencyController() 
    {
        
    }
    
    /**
     * 
     * @param array $filtersArray
     */
    public function appendFrom(array $filtersArray)
    {
        foreach ($filtersArray as $filterName => $filterParameters){
            $filter = new Filter();
            $this->getDependency('injector')->inject($filter);
            $this->filters[$filterName] = $filter;
            array_push($this->filters, $filter);
        }
        
    }
    
    public function append(Filter $filter)
    {
        
    }
    
    
}


?>