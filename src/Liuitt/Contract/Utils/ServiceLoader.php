<?php
namespace Liuitt\Contract\Utils;

interface ServiceLoader
{

    /**
     * Returns a string describing this service.
     *
     * @return mixed
     */
    public function __toString();

    /**
     * Creates a new service loader for the given service type.
     *
     * @param $serviceName
     * @param $className
     * @return mixed
     */
    public function load($serviceName, $className);

    /**
     * Creates a new service loader for the given service type, using the extension class loader.
     *
     * @return mixed
     */
    public function loadInstalled();

    /**
     * Lazily loads the available providers of this loader's service.
     *
     * @return mixed
     */
    public function interator();

    /**
     * Clear this loader's provider cache so that all providers will be reloaded.
     *
     * @return void
     */
    public function reload();
}
