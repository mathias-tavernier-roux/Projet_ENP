<?php

namespace App\Models;

use CodeIgniter\Model;

class AppstoreModel extends Model
{
    protected $DBGroup = 'default';
    protected $table      = 'appstore';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','app_name','zip_name','version','type'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function list()
    {
        return $this->findall();
    }
    public function list_my_apps()
    {
        $application = $this->findall();
        $application = array_column($application, 'app_name');
        return $application;
    }
    public function list_official()
    {
        return $this->where('type', "OFFICIAL")->findall();
    }
    public function find_id($app_name, $zip_name, $type)
    {
        return $this->where('app_name', $app_name)->where('zip_name', $zip_name)->where('type', $type)->first();
    }
    public function list_homebrew()
    {
        return $this->where('type', "HOMEBREW")->findall();
    }
    public function install($app_name,$zip_name,$version,$type)
    {
        $data = [
            'app_name' => $app_name,
            'zip_name' => $zip_name,
            'version' => $version,
            'type' => $type,
        ];
        return $this->insert($data);
    }
    public function upgrade($id,$version)
    {
        $data = [
            'version' => $version,
        ];
        return $this->update($id, $data);
    }
    public function remove($id)
    {
        return $this->delete($id);
    }
   
}