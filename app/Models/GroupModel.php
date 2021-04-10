<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $DBGroup = 'default';
    protected $table      = 'group';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','name','pole','taille'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function create($group_name,$pole,$taille)
    {
        $data = [
            'name' => $group_name,
            'pole'    => $pole,
            'taille'    => $taille,
        ];
        
        $this->insert($data);
    }
    public function list()
    {
        return $this->findAll();
    }

    public function remove($GID)
    {
        return $this->delete($GID);
    }
}