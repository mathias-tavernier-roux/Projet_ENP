<?php

namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $DBGroup = 'system';
    protected $table      = 'permission';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name','app','page', 'variant','group', 'role', 'type'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function create($name,$app,$page,$variant,$group,$role)
    {
        $data = [
            'name' => $name,
            'app' => $app,
            'page' => $page,
            'variant'  => $variant,
            'group' => $group,
            'role'  => $role,
            'type' => "OTHER",
        ];
        $this->insert($data);
    }
    public function list_system()
    {
        return $this->where('type', 'SYSTEM')->findAll();
    }
    public function list_other()
    {
        return $this->where('type', 'OTHER')->findAll();
    }
    public function list_my_perms($group, $role)
    {
        return $this->where('group', $group)->where('role', $role)->findAll();
    }
    public function get_permission_variant($group, $role)
    {
        return $this->where('app', "Users")->where('page', "list")->where('group', $group)->where('role', $role)->first();
    }
    public function get_permission_info($id)
    {
        return $this->find($id);
    }
    public function remove($PID)
    {
        return $this->delete($PID);
    }
    public function clear_group($ID)
    {
       $list = $this->where('group', $ID)->findAll();
        if ($list != NULL) 
        {
            foreach ($list as $permission) 
            {
        $this->delete($permission['id']);
            }
        }
    }
    public function clear_role($ID)
    {
       $list = $this->where('role', $ID)->findAll();
        if ($list != NULL) 
        {
            foreach ($list as $permission) 
            {
        $this->delete($permission['id']);
            }
        }
    }
}