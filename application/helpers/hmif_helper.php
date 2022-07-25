<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('admin_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('admin_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
function check_active($id, $is_active)
{
    $ci = get_instance();
    $ci->db->where('id', $id);
    $ci->db->where('is_active', $is_active);
    if ($is_active == 1) {
        return "checked='checked'";
    }
}

function starred($id)
{
    $ci = get_instance();

    $ci->db->where('id', $id);
    $ci->db->where('is_starred', '1');
    $result = $ci->db->get('inbox');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('admin_access_menu');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
