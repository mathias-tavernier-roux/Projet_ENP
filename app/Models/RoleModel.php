<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $DBGroup = 'default';
    protected $table      = 'role';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name','description','hierarchy'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function create($role_name,$description,$hierarchy)
    {
        $data = [
            'name' => $role_name,
            'description'    => $description,
            'hierarchy'    => $hierarchy,
        ];
        $this->insert($data);
    }
    public function list()
    {
        return $this->findall();
    }

    public function remove($RID)
    {
        return $this->delete($RID);
    }
}