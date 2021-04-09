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
    protected $useSoftDeletes = true;

    protected $allowedFields = ['first_name','last_name','birth','login','password','group', 'role'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function create($first_name,$last_name,$birth,$login,$password,$group_id,$role_id)
    {
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birth'    => $birth,
            'login'    => $login,
            'password'    => $password,
            'group_id'    => $group_id,
            'role_id'    => $role_id,
        ];
        
        $this->insert($data);
    }
    public function list()
    {
        $this->findall();
    }
    public function edit($first_name,$last_name,$birth,$login,$password,$group_id,$role_id)
    {
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birth'    => $birth,
            'login'    => $login,
            'password'    => $password,
            'group_id'    => $group_id,
            'role_id'    => $role_id,
        ];
        
        $this->update($data);
    }

    public function remove($GID)
    {
        $this->delete($GID);
    }
}