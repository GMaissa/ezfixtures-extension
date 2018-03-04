<?php
/**
 * File part of the eZFixturesExtension project.
 *
 * @copyright 2018 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace GMaissa\eZFixturesExtension\API\Collection;

use Kaliop\eZMigrationBundle\API\Collection\AbstractCollection;

/**
 * Fixture Steps Collection
 *
 * @author Guillaume Maïssa <guillaume@maissa.fr>
 */
class FixtureStepsCollection extends AbstractCollection
{
    protected $allowedClass = 'GMaissa\eZFixturesExtension\API\Value\FixtureStep';
}
