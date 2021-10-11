<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\EloquentInterface;

abstract class EloquentRepository implements EloquentInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;
    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }
        /**
     * get model
     * @return string
     */
    abstract public function getModel();
    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->_model->search()->paginate(10);
    }
    public function getthucung()
    {
        return $this->_model::orderBy('id', 'ASC')->where('type_post', 2)->search()->paginate(10);
    }
    public function getsanpham()
    {
        return $this->_model::orderBy('id', 'ASC')->where('type_post', 1)->search()->paginate(10);
    }

    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }

    public function update($id,array $attributes)
    {
        return $this->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function find($id)
    {
        try
        {
            return $this->_model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return false;
        }
    }
}