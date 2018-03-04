<?php
/**
 * File part of the eZFixturesExtension project.
 *
 * @copyright 2018 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace GMaissa\eZFixturesExtension\Context;

use Behat\Gherkin\Node\TableNode;
use Behat\Symfony2Extension\Context\KernelAwareContext;
use Behat\Symfony2Extension\Context\KernelDictionary;
use GMaissa\eZFixturesBundle\API\Value\FixtureDefinition;
use GMaissa\eZFixturesBundle\API\FixturesContextInterface;
use GMaissa\eZFixturesBundle\Core\Service\FixturesService;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Class FixturesContext
 *
 * @author Guillaume Maïssa <guillaume@maissa.fr>
 */
class FixturesContext implements KernelAwareContext, FixturesContextInterface
{
    use KernelDictionary;

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

    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
        /* @var Container $container */
        $container = $kernel->getContainer();
        $fixturesService = $container->get('gm.ez_fixtures.fixtures_service');

        $this->setFixturesService($fixturesService);
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

    /**
     * @Given the fixtures :fixturesFile are loaded
     * @Given the fixtures file :fixturesFile is loaded
     *
     * @param string $fixturesFile Path to the fixtures
     */
    public function thereAreFixtures($fixturesFile)
    {
        $this->loadFixtures(
            array(sprintf('%s/%s', $this->fixturesBaseDir, $fixturesFile))
        );
    }

    /**
     * @Given the following fixtures are loaded:
     * @Given the following fixtures files are loaded:
     *
     * @param TableNode $fixturesFileRows Path to the fixtures
     */
    public function thereAreSeveralFixtures(TableNode $fixturesFileRows)
    {
        $fixturesFiles = [];
        foreach ($fixturesFileRows->getRows() as $fixturesFileRow) {
            $fixturesFiles[] = sprintf('%s/%s', $this->fixturesBaseDir, $fixturesFileRow[0]);
        }
        $this->loadFixtures($fixturesFiles);
    }

    /**
     * Import fixtures
     *
     * @param array $paths
     */
    public function loadFixtures(array $paths = array())
    {
        $toExecute = $this->fixturesService->buildFixturesList($paths);
        $executed = 0;
        $skipped = 0;

        /** @var FixtureDefinition $definition */
        foreach ($toExecute as $name => $definition) {
            // let's skip migrations that we know are invalid - user was warned and he decided to proceed anyway
            if ($definition->status == FixtureDefinition::STATUS_INVALID) {
                $skipped++;
                continue;
            }

//            try {
                $this->fixturesService->executeFixture($definition);
                $executed++;
//            } catch (\Exception $e) {
//            }
        }
    }
}
