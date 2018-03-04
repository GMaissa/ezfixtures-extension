<?php
/**
 * File part of the eZFixturesExtension project.
 *
 * @copyright 2018 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace GMaissa\eZFixturesExtension\Core\Context\Initializer;

use Behat\Behat\Context\Context;
use GMaissa\eZFixturesExtension\API\FixturesContextInterface;
use GMaissa\eZFixturesExtension\Core\Service\FixturesService;

/**
 * Class ContextInitializer
 *
 * @author Guillaume Maïssa <guillaume@maissa.fr>
 */
class ContextInitializer
{
    /**
     * @var string
     */
    private $fixturesBaseDir;

    /**
     * @var FixturesService $fixturesService
     */
    private $fixturesService;

    /**
     * @param FixturesService $fixturesService
     * @param string $fixturesBaseDir
     */
    public function __construct(FixturesService $fixturesService, $fixturesBaseDir)
    {
        $this->fixturesService = $fixturesService;
        $this->fixturesBaseDir = $fixturesBaseDir;
    }
    /**
     * Initializes provided context.
     *
     * @param Context $context
     */
    public function initializeContext(Context $context)
    {
        if (false === $context instanceof FixturesContextInterface) {
            return;
        }

        /* @var FixturesContextInterface $context */
        if (null === $context->getFixturesBaseDir()) {
            $context->setFixturesService($this->fixturesService);
            $context->setFixturesBaseDir($this->fixturesBaseDir);
        }
    }
}
