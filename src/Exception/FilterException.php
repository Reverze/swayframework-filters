<?php

namespace Sway\Component\Filter\Exception;

class FilterException extends \Exception
{
    /**
     * Throws an exception when controller is not specified for filter
     * @param string $filterName
     * @return \Sway\Component\Filter\Exception\FilterException
     */
    public static function filterControllerNotSpecified(string $filterName)
    {
        return (new FilterException(sprintf("Controller not specified for '%s' filter", $filterName)));
    }
}


?>

