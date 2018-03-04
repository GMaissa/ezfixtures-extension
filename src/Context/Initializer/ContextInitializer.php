<?php
/**
 * File part of the eZFixturesExtension project.
 *
 * @copyright 2018 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace GMaissa\eZFixturesExtension\Core\Context\Initializer;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\Initializer\ContextInitializer as BaseContextInitializer;
use GMaissa\eZFixturesExtension\API\FixturesContextInterface;
use GMaissa\eZFixturesExtension\Core\Service\FixturesService;

/**
 * Class ContextInitializer
 *
 * @author Guillaume Maïssa <guillaume@maissa.fr>
 */
class ContextInitializer implements BaseContextInitializer
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
    public function __construct(
        $fixturesBaseDir
//        , FixturesService $fixturesService
    ) {
        $this->fixturesBaseDir = $fixturesBaseDir;
        $this->fixturesService = $fixturesService;
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
            $context->setFixturesBaseDir($this->fixturesBaseDir);
        }
        //$context->setFixturesService($this->fixturesService);
    }
}
