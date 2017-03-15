<?php
abstract class Model{

    /**
     * Get all models
     *
     * @return array
     */
    abstract public function all();

    /**
     * Load model
     *
     * @param int $id
     * @return Model
     */
    abstract public function load($id);

    /**
     * If object has id than update
     * Else create new model
     *
     * @return Model
     */
    abstract public function save();

    /**
     * Delete model
     *
     * @return void
     */
    abstract public function delete();
}