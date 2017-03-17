<?php

namespace Sway\Component\Filter;

use Sway\Component\Dependency\DependencyInterface;
use Sway\Component\Controller\Invoker;

class Filter extends DependencyInterface
{
    /**
     * Full controller's path
     * @var string
     */
    private $controllerPath = null;
    
    /**
     * Full controller's callable path
     * @var array
     */
    private $callableControllerPath = null;
    
    /**
     * Controller's invoker
     * @var \Sway\Component\Controller\Invoker
     */
    private $controllerInvoker = null;
    
    /**
     * Filter's name
     * @var string
     */
    private $filterName = null;
    
    public function __construct()
    {
        
    }
    
    protected function dependencyController() 
    {
        /**
         * Gets controller's invoker as dependency
         */
        $this->controllerInvoker = $this->getDependency('invoker');
    }
    
    public function createFrom(string $filterName, array $filterParameters)
    {
        /**
         * Stores filter's name
         */
        $this->setName($filterName);
        
        /**
         * Filter's controller must be specified
         */
        if (!array_key_exists('controller', $filterParameters)){
            throw Exception\FilterException::filterControllerNotSpecified($filterName);
        }
        else{
            $this->controllerPath = $filterParameters['controller'];
            $this->callableControllerPath = $this->controllerInvoker->getCallableControllerPath($this->controllerPath);
        }
    }
    
    /**
     * Sets filter's name
     * @param string $filterName
     */
    protected function setName(string $filterName)
    {
        $this->filterName = $filterName;
    }
    
    /**
     * Gets filter's name
     * @return string
     */
    public function getName()
    {
        return $this->filterName;
    }
}


?>

