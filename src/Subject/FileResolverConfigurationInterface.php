<?php

/**
 * TechDivision\Import\Configuration\Subject\FileResolverConfigurationInterface
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2020 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-configuration
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Configuration\Subject;

/**
 * The interface for a file resolver's configuration.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2020 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-configuration
 * @link      http://www.techdivision.com
 */
interface FileResolverConfigurationInterface
{

    /**
     * Returns the file resolver's unique DI identifier.
     *
     * @return string The file resolver's unique DI identifier
     */
    public function getId();

    /**
     * Returns the prefix/meta sequence for the import files.
     *
     * @return string The prefix
     */
    public function getPrefix();

    /**
     * Query's whether or not a custom prefix has been configured for the
     * file resolver.
     *
     * @param string $defaultPrefix The default prefix to match against
     *
     * @return boolean TRUE if the file resolver has a custom prefix, else FALSE
     */
    public function hasPrefix($defaultPrefix = '.*');

    /**
     * Returns the filename/meta sequence of the import files.
     *
     * @return string The suffix
     */
    public function getFilename();

    /**
     * Returns the counter/meta sequence of the import files.
     *
     * @return string The suffix
     */
    public function getCounter();

    /**
     * Returns the suffix for the import files.
     *
     * @return string The suffix
     */
    public function getSuffix();

    /**
     * Return's the suffix for the OK file.
     *
     * @return string The OK file suffix
     */
    public function getOkFileSuffix();

    /**
     * Returns the delement separator char.
     *
     *  @return string The element separator char
     */
    public function getElementSeparator();

    /**
     * Returns the elements the filenames consists of.
     *
     * @return array The array with the filename elements
     */
    public function getPatternElements();
}
