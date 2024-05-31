<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    if (!isset($_GET['page_id'])) {
        $view = 'contact';
    } else {
        $page_id = (int)$_GET['page_id'];
        $info_page = get_info_page_by_id($page_id);
        $view = 'index';
    }
    $list_product = get_list_product();
    $list_ads = get_list_ads_by_status();
    $list_category = get_list_category();
    $data = array(
        'list_product' => $list_product,
        'list_ads' => $list_ads,
        'info_page' => $info_page ?? null,
        'list_category' => $list_category,
    );
    load_view($view, $data);
}
