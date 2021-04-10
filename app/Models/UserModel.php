<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['first_name','last_name','birth','login','password','group_id', 'role_id','group_name', 'role_name'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function create($first_name,$last_name,$group_id,$role_id,$group_name,$role_name,$birth,$login,$password)
    {
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birth'    => $birth,
            'login'    => $login,
            'password' => $password,
            'group_id' => $group_id,
            'role_id'  => $role_id,
            'group_name' => $group_name,
            'role_name'  => $role_name,
        ];
        $this->insert($data);
    }
    public function list()
    {
        return $this->findall();
    }
    public function edit($id,$group_id,$role_id,$group_name,$role_name)
    {
        $data = [
            'group_id' => $group_id,
            'role_id' => $role_id,
            'group_name' => $group_name,
            'role_name' => $role_name,
        ];
        
        return $this->update($id, $data);
    }

    public function remove($UID)
    {
        return $this->delete($UID);
    }
}