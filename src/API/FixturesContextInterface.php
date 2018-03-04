<?php
/**
 * File part of the eZFixturesExtension project.
 *
 * @copyright 2018 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace GMaissa\eZFixturesExtension\API;

use GMaissa\eZFixturesExtension\Core\Service\FixturesService;

/**
 * eZ Fixtures Contexts Interface
 *
 * @author Guillaume Maïssa <guillaume@maissa.fr>
 */
interface FixturesContextInterface
{
    /**
     * @param string $fixturesBaseDir
     *
     * @return $this
     */
    public function setFixturesBaseDir($fixturesBaseDir);

    /**
     * @return string
     */
    public function getFixturesBaseDir();

    /**
     * @param FixturesService $fixturesService
     *
     * @return $this
     */
    public function setFixturesService(FixturesService $fixturesService);

    /**
     * @return FixturesService
     */
    public function getFixturesService();
}
