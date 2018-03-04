<?php
/**
 * File part of the eZFixturesExtension project.
 *
 * @copyright 2018 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace GMaissa\eZFixturesExtension\Core\Context;

use GMaissa\eZFixturesExtension\API\FixturesContextInterface;
use GMaissa\eZFixturesExtension\Core\Service\FixturesService;

/**
 * Class FixturesContext
 *
 * @author Guillaume Maïssa <guillaume@maissa.fr>
 */
class FixturesContext implements FixturesContextInterface
{
    /**
     * @var FixturesService $fixturesService
     */
    protected $fixturesService;

    /**
     * @var string
     */
    protected $fixturesBaseDir;

    /**
     * @param string|null     $fixturesBaseDir
     */
    public function __construct($fixturesBaseDir = null)
    {
        $this->fixturesBaseDir = $fixturesBaseDir;
    }

    /**
     * {@inheritdoc}
     */
    final public function setFixturesBaseDir($fixturesBaseDir)
    {
        $this->fixturesBaseDir = $fixturesBaseDir;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    final public function getFixturesBaseDir()
    {
        return $this->fixturesBaseDir;
    }

    /**
     * {@inheritdoc}
     */
    final public function setFixturesService(FixturesService $fixturesService)
    {
        $this->fixturesService = $fixturesService;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    final public function getFixturesService()
    {
        return $this->fixturesService;
    }
}
