<?php
/**
 * File part of the eZFixturesExtension project.
 *
 * @copyright 2018 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace GMaissa\eZFixturesExtension\API\Collection;

use Kaliop\eZMigrationBundle\API\Value\MigrationDefinition;

/**
 * Fixture Definition
 *
 * @author Guillaume Maïssa <guillaume@maissa.fr>
 */
class FixtureDefinition extends MigrationDefinition
{
    /**
     * @param string $name
     * @param string $path
     * @param string $rawDefinition
     * @param int $status
     * @param FixtureStep[]|FixtureStepsCollection $steps
     * @param string $parsingError
     */
    public function __construct($name, $path, $rawDefinition, $status = 0, $steps = array(), $parsingError = null)
    {
        parent::__construct($name, $path, $rawDefinition, $status, $steps, $parsingError);

        $this->steps = ($steps instanceof FixtureStepsCollection) ? $steps : new FixtureStepsCollection($steps);
    }
}
