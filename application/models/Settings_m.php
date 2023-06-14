<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_m extends CI_Model
{
    public function getSetting()
    {
        $setting = $this->db->get('settings')->row_array();
        return $setting;
    }
    public function editSetting($logo, $latar, $title, $initial, $id)
    {
        $data = [
            "logo" => $logo,
            "latar" => $latar,
            "title" => $title,
            "initial" => $initial
        ];
        $this->db->where('idsetting', $id);
        $hasil = $this->db->update('settings', $data);
        if ($hasil) {
            return true;
        } else {
            return false;
        }
    }
}
