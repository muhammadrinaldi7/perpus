<?php

function cekstatuslogin()
{
    $ci = get_instance();
    $sesi = $ci->session->userdata('iduser');
    if (!$sesi) {
        redirect(base_url('auth'));
    }
}

function cekroleadmin()
{
    $ci = get_instance();
    $level = $ci->session->userdata('role')=='admin';
   if (!$level) {
    redirect(base_url('admin/dashboard'));
   }
}