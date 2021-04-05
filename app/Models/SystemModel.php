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
    protected $useSoftDeletes = true;

    protected $allowedFields = ['Complete_Name','Little_Name','Version','UNLOCK','ADMIN_LOGIN','ADMIN_PASSWORD'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}