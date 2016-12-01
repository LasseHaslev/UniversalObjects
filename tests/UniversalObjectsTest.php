<?php

use LasseHaslev\UniversalObjects\Object;

/**
 * Class Object
 * @author Lasse S. Haslev
 */
class UniversalObjectsTest extends TestCase
{
    /** @test */
    public function is_creating_new_object_if_no_other_exists() {
        $object = Object::create();
        $this->assertInstanceOf( Object::class, $object );
    }

    /** @test */
    public function object_returns_self_when_created() {
        $object = Object::create();
        $objectTwo = Object::create();
        $this->assertSame( $object, $objectTwo );
    }

    /** @test */
    public function can_create_new_object() {
        $object = Object::create();
        $objectTwo = Object::createNew();
        $this->assertNotSame( $object, $objectTwo );
    }

    /** @test */
    public function can_destroy_instance() {
        $object = Object::create();
        Object::destroy();
        $objectTwo = Object::create();
        $this->assertNotSame( $object, $objectTwo );
    }

    /** @test */
    public function can_create_new_instance_with_referenceId() {
        $object = Object::create( 'backend' );
        $this->assertInstanceOf( Object::class, $object );
    }

    /** @test */
    public function can_get_referenceId_from_object() {
        $referenceId = 'backend';
        Object::destroy( 'backend' );
        $object = Object::create( $referenceId );
        $this->assertEquals( $referenceId, $object->referenceId() );
    }

    /** @test */
    public function static_function_get_is_an_alias_of_static_function_create() {
        $strRandom = str_random();
        Object::get($strRandom);
        $this->assertEquals( $strRandom, ( Object::get($strRandom) )->referenceId() );
    }

    /** @test */
    public function is_creating_one_more_instance_if_referenceId_is_set() {
        $referenceId1 = str_random(30);
        $referenceId2 = str_random(30);
        Object::destroy();
        $object1 = Object::create();
        $object2 = Object::create( $referenceId1 );
        $object3 = Object::create( $referenceId2 );

        $this->assertSame( $object1, ( Object::get() ) );
        $this->assertSame( $object2, ( Object::get( $referenceId1 ) ) );
        $this->assertSame( $object3, ( Object::get( $referenceId2 ) ) );
    }

    /** @test */
    public function can_destoy_instance_of_object() {
        $referenceId1 = str_random(30);
        $referenceId2 = str_random(30);
        $object = Object::create();
        $object2 = Object::create( $referenceId1 );
        $object3 = Object::create( $referenceId2 );

        Object::destroy();
        Object::destroy( $referenceId1 );
        Object::destroy( $referenceId2 );

        $this->assertNotSame( $object, Object::get() );
        $this->assertNotSame( $object2, Object::get( $referenceId1 ) );
        $this->assertNotSame( $object3, Object::get( $referenceId2 ) );
    }

    /** @test */
    public function has_function_to_destroy_all_instances() {
        $referenceId1 = str_random(30);
        $referenceId2 = str_random(30);
        $object = Object::create();
        $object2 = Object::create( $referenceId1 );
        $object3 = Object::create( $referenceId2 );

        Object::destroyAll();

        $this->assertNotSame( $object, Object::get() );
        $this->assertNotSame( $object2, Object::get( $referenceId1 ) );
        $this->assertNotSame( $object3, Object::get( $referenceId2 ) );
    }
}
