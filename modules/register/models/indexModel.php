<?php
function register($data)
{
    return db_insert("tbl_users", $data);
}