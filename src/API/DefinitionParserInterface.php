<?php
/**
 * File part of the eZFixturesExtension project.
 *
 * @copyright 2018 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace GMaissa\eZFixturesExtension\API;

use GMaissa\eZFixturesExtension\API\Collection\FixtureDefinition;

/**
 * Fixture file parser Interface
 *
 * @author Guillaume Maïssa <guillaume@maissa.fr>
 */
interface DefinitionParserInterface
{
    /**
     * Tells whether the given file can be handled by this handler, by checking e.g. the suffix
     *
     * @param string $fixtureName typically a filename
     * @return bool
     */
    public function supports($fixtureName);

    /**
     * Parses a fixture definition, and returns the list of actions to take, as a new definition object.
     * The new definition should have either status STATUS_PARSED and some steps, or STATUS_INVALID and an error message
     *
     * @param FixtureDefinition $definition
     *
     * @return FixtureDefinition
     */
    public function parseDefinition(FixtureDefinition $definition);
}
