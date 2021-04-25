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

    protected $allowedFields = ['id','name','pole','taille','link_name'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function create($group_name,$pole,$taille,$link)
    {
        $data = [
            'name' => $group_name,
            'pole'    => $pole,
            'taille'    => $taille,
            'link_name'    => $link,
        ];
        
        $this->insert($data);
    }
    public function list()
    {
        return $this->findAll();
    }
    public function list_limited($variant)
    {
        if ($variant == "ALL")
        {
            return $this->findAll();
        }
        else
        {
            return $this->where('link_name', $variant)->findAll();
        }
    }
    public function remove($GID)
    {
        return $this->delete($GID);
    }
}