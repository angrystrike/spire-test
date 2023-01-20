<?php

class Address {
    public $_tableName = 'addresses';
    private $_db;
    private $_data;

    public function __construct($addressId = null) {
        $this->_db = Database::getInstance();

        if ($addressId) {
            $this->find($addressId);
        }
    }

    public function data()
    {
        return $this->_data;
    }
    
    public function find($addressId = null)
    {
        if ($addressId)
        {
            $field  = 'id';
            $data = $this->_db->get($this->_tableName, array($field, '=', $addressId));

            if ($data->count())
            {
                $this->_data = $data->first();
                return true;
            }
        }
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert($this->_tableName, $fields))
        {
            throw new Exception("Unable to create the address.");
        }
    }

}
