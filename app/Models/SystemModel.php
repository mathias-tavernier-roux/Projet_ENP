<?php

namespace App\Models;

use CodeIgniter\Model;

class SystemModel extends Model
{
    protected $DBGroup = 'default';
    protected $table      = 'system';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','complete_name','little_name','version_systeme','version_framework','unlock',];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function info()
    {
        return $this->first();
    }
    public function unlock()
    {
        $data = [
            'unlock' => TRUE,
        ];
        return $this->update(1 , $data);
    }
    public function install($big_name, $little_name)
    {
        $data = [
            'complete_name' => $big_name,
            'little_name' => $little_name,
        ];
        $this->insert($data);
        
    }
    public function update_data($big_name, $little_name)
    {
        $data = [
            'complete_name' => $big_name,
            'little_name' => $little_name,
        ];
        $this->update(1 , $data);
    }
}