<?php

namespace Tests\Unit\PhosphorIconsServiceProvider;

use Illuminate\View\Compilers\BladeCompiler;
use Tests\UnitTestCase;

class DontRegisterIconComponentAliasTest extends UnitTestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('wireui.phosphoricons.alias', false);
    }

    public function test_should_register_the_icon_blade_component_with_a_custom_alias()
    {
        /** @var BladeCompiler $bladeCompiler */
        $bladeCompiler = resolve(BladeCompiler::class);

        $aliases = $bladeCompiler->getClassComponentAliases();

        $this->assertArrayNotHasKey('custom-icon', $aliases, "The custom alias shouldn't be registered");
    }
}
