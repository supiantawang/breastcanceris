<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'ek_admin';
    protected $primaryKey = 'u_id';
    protected $useTimestamps = true;

    protected $createdField  = 'u_created';
    protected $updatedField  = 'u_modified';
    protected $allowedFields = ['u_loginname', 'u_loginpass', 'u_fullname', 'u_noic', 'u_email', 'u_contact', 'u_status', 'u_role', 'u_position'];
    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where('u_id', $id)->get()->getRow();
        }
    }
    public function selectRole()
    {

        $db = \Config\Database::connect();
        $query = $db->table('ek_lkprole');
        $result = $query->orderBy("role_id", "ASC")->get();

        $data[''] = ' - Sila Pilih - ';
        foreach ($result->getResult() as $dt) {
            $data[$dt->role_id] = $dt->role_desc;
        }
        return $data;
    }
}
