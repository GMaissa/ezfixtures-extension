<?php
/**
 * File part of the eZFixturesExtension project.
 *
 * @copyright 2018 Guillaume Maïssa
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace GMaissa\eZFixturesExtension\API\Exception;

class FixtureStepExecutionException extends \Exception
{
    public function __construct($message = "", $step = 0, \Exception $previous = null)
    {
        $message = "Error in execution of step $step: " . $message;

        parent::__construct($message, $step, $previous);
    }
}
