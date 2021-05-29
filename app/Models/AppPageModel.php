<?php

namespace App\Models;

use CodeIgniter\Model;

class AppPageModel extends Model
{
    protected $DBGroup = 'default';
    protected $table      = 'apppage';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','app_name','page','shortcut_name'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function list_pages($app)
    {
        $page = $this->where('app_name', $app)->findall();
        return $page;
    }
    public function remove($app)
    {
        return $this->where('app_name', $app)->delete();
    }
   
}