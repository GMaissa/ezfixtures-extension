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
 * Fixture Definition Collection
 *
 * @author Guillaume Maïssa <guillaume@maissa.fr>
 */
class FixtureDefinitionCollection extends AbstractCollection
{
    protected $allowedClass = 'GMaissa\eZFixturesExtension\API\Value\FixtureDefinition';
}
