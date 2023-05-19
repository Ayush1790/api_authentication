<?php

declare(strict_types=1);

namespace Tests\Unit;

use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Di;
use Phalcon\Di\FactoryDefault;
use Phalcon\Incubator\Test\PHPUnit\UnitTestCase;
use PHPUnit\Framework\IncompleteTestError;

abstract class AbstractUnitTest extends UnitTestCase
{
    private bool $loaded = false;

    protected function setUp(): void
    {
        parent::setUp();

        $di = new FactoryDefault();

        Di::reset();
        Di::setDefault($di);
        $di->set(
            'db',
            function () {
                return new Mysql(
                    [
                        'host'     => 'mysql-server',
                        'username' => 'root',
                        'password' => 'secret',
                        'dbname'   => 'phalt',
                    ]
                );
            }
        );
        $this->loaded = true;
    }

    public function __destruct()
    {
        if (!$this->loaded) {
            throw new IncompleteTestError(
                "Please run parent::setUp()."
            );
        }
    }
}
