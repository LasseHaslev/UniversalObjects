<?php

namespace LasseHaslev\UniversalObjects;

/**
 * Class Object
 * @author Lasse S. Haslev
 */
class Object
{

    static $instances = [];

    protected $referenceId = null;

    /**
     * Alias of function create
     *
     * @return static
     */
    public static function get( string $referenceId = null )
    {
        return static::create( $referenceId );
    }


    /**
     * Create new element or reuse static if exists
     *
     * @return static
     */
    public static function create( string $referenceId = null )
    {

        $referenceId = static::setReferenceId($referenceId);

        // if instances of referenceId exists use that instead
        if ( isset( static::$instances[ $referenceId ] ) ) {
            return static::$instances[ $referenceId ];
        }

        return static::createNew( $referenceId );
    }

    /**
     * Create new Element
     *
     * @return static
     */
    public static function createNew( string $referenceId = null )
    {

        $referenceId = static::setReferenceId($referenceId);

        $instance = new static;

        $instance->referenceId = $referenceId;

        static::$instances[ $referenceId ] = $instance;

        return $instance;
    }

    /**
     * Destroy all instances of Object
     *
     * @return void
     */
    public static function destroyAll()
    {
        static::destroy();
        static::$instances = [];
    }


    /**
     * Destroy static instance of this
     *
     * @return void
     */
    public static function destroy( string $referenceId = null )
    {
        $referenceId = static::setReferenceId($referenceId);

        if ( isset( static::$instances[ $referenceId ] ) ) {
            unset( static::$instances[ $referenceId ] );
        }
    }

    public static function setReferenceId(string $referenceId = null)
    {
        if ( $referenceId == null ) {
            $referenceId = static::class;
        }
        return $referenceId;
    }


    /**
     * Get referenceId of this page controller
     *
     * @return string
     */
    public function referenceId()
    {
        return $this->referenceId;
    }

}
