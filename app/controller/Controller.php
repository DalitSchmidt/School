<?php
namespace School\Controller;
use School\Model\Model;

interface ICRUDable {
    /**
     * Handles GET Request
     * Shows a full list of the resource
     * @return mixed
     */
    public function show();

    /**
     * Handles GET Request
     * Fetches ONE record of the resource (by id only)
     * @param int $resource_id
     * @return mixed
     */
    public function fetch( int $resource_id );

    /**
     * Handles PUT Request
     * Updates resource
     * @param int $resource_id
     * @param array $args
     * @return mixed
     */
    public function update( int $resource_id, array $args );

    /**
     * Handles DELETE Request
     * Removes a resource
     * @param int $resource_id
     * @return mixed
     */
    public function destroy( int $resource_id );

    /**
     * Handles POST Request
     * Creates a new resource
     * @param array $args
     * @return mixed
     */
    public function create( array $args );
}

abstract class Controller implements ICRUDable {
    protected $model;

    public function __construct( Model $model ) {
        $this->model = $model;
    }
}