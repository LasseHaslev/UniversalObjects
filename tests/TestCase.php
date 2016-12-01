<?php

/**
 * Class TestCase
 * @author Lasse S. Haslev
 */
class TestCase extends Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();
    }
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
    }

    /**
     * Check if assert uses trait
     *
     * @return bool
     */
    protected function assertInstanceUsesTrait( string $trait, $assert )
    {
        return $this->assertTrue( in_array( $trait, class_uses( $assert ) ) );
    }

    /**
     * Check if assert NOT uses trait
     *
     * @return void
     */
    protected function assertInstanceNotUsesTrait( string $trait, $assert )
    {
        return ! $this->assertInstanceUsesTrait( $trait, $assert );
    }

}
