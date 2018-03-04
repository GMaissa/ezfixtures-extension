# eZMigrationBundle Extension

## About

This bundle provides a Behat Context class to load fixtures files using Kaliop eZ-Migration Bundle.

## Installation

With composer :

First add the package repository to your composer.json file (package not yet available on packagist):

    ...
    "repositories": [
        ...
        {
            "type": "vcs",
            "url": "https://github.com/GMaissa/eZFixturesExtension.git"
        }
    ],
    ...

Install the package :

    php composer.phar require --dev gmaissa/ezfixtures-extension

## Usage

Activate the extension in your behat.yml file :

    default:
        # ...
        extensions:
            GMaissa\eZFixturesExtension:
                fixtures_base_dir: ~ # default to %paths.base%/features/fixtures

Enable the context:

    default:
        suites:
            default:
                contexts:
                - GMaissa\eZFixturesExtension\Context\FixturesContext

                # or if you want to set the base path only for this context:
                - GMaissa\eZFixturesExtension\Context\FixturesContext:
                    fixturesBaseDir: %paths.base%/tests/Features/fixtures/ORM (default value)

## Contributing

In order to be accepted, your contribution needs to pass a few controls : 

* PHP files should be valid
* PHP files should follow the [PSR-2](http://www.php-fig.org/psr/psr-2/) standard
* PHP files should be [phpmd](https://phpmd.org) and [phpcpd](https://github.com/sebastianbergmann/phpcpd) warning/error free

Finally, in order to homogenize commit messages across contributors (and to ease generation of the CHANGELOG), please apply this [git commit message hook](https://gist.github.com/GMaissa/f008b2ffca417c09c7b8) onto your local repository. 
