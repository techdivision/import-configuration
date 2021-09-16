<?php

/**
 * TechDivision\Import\Configuration\CacheConfigurationInterface
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2020 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-configuration
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Configuration;

/**
 * Interface for the cache configuration implementation.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2020 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-configuration
 * @link      http://www.techdivision.com
 */
interface CacheConfigurationInterface
{

    /**
     * Return's the cache type
     *
     * @return string The cache type
     */
    public function getType();

    /**
     * Return's the flag whether the cache is enabled or not.
     *
     * @return boolean TRUE if the cache is enabled, else FALSE
     */
    public function isEnabled();

    /**
     * Return's the cache TTL in seconds.
     *
     * @return integer The TTL
     */
    public function getTime();

    /**
     * Return's the reference to the configuration instance.
     *
     * @return \TechDivision\Import\Configuration\ConfigurationInterface The configuration instance
     */
    public function getConfiguration();
}
