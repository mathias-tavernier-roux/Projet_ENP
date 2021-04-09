<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $DBrole = 'default';
    protected $table      = 'role';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name','description','level'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function create($role_name,$description,$level)
    {
        $data = [
            'name' => $role_name,
            'description'    => $description,
            'level'    => $level,
        ];
        
        $this->insert($data);
    }
    public function list()
    {
        $this->findall();
    }
    public function edit($role_name,$description,$level)
    {
        $data = [
            'name' => $role_name,
            'description'    => $description,
            'level'    => $level,
        ];
        
        $this->update($data);
    }

    public function remove($GID)
    {
        $this->delete($GID);
    }
}