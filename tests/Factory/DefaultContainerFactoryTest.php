<?php
declare(strict_types=1);

namespace Zalas\Injector\Tests\Factory;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Container\ContainerInterface;
use Zalas\Injector\Factory\DefaultContainerFactory;
use Zalas\Injector\Service\ContainerFactory;

class DefaultContainerFactoryTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @var DefaultContainerFactory
     */
    private $factory;

    /**
     * @var ContainerInterface|ObjectProphecy
     */
    private $container;

    protected function setUp(): void
    {
        $this->container = $this->prophesize(ContainerInterface::class);
        $this->factory = new DefaultContainerFactory($this->container->reveal());
    }

    public function test_it_is_a_container_factory()
    {
        $this->assertInstanceOf(ContainerFactory::class, $this->factory);
    }

    public function test_it_returns_the_container_it_was_initialized_with()
    {
        $this->assertSame($this->container->reveal(), $this->factory->create());
    }
}
