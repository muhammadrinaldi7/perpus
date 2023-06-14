<?php

function cekstatuslogin()
{
    $ci = get_instance();
    $sesi = $ci->session->userdata('iduser');
    if (!$sesi) {
        redirect(base_url('auth'));
    }
}
