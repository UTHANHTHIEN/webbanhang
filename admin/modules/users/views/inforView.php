<?php
get_header();
?>
<div id="page-body" class="d-flex">
    <?php
    get_sidebar();
    ?>
    <div id="wp-content">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title mt-2">Thông tin</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Tên</td>
                                <td><strong>Mod</strong></td>
                            </tr>
                            <tr>
                                <td>Chức vụ</td>
                                <td><strong>Quản trị viên</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>phongnq@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Ngày tham gia</td>
                                <td>2022-11-17 22:36:23</td>
                            </tr>
                            <tr>
                                <td><a href="?mod=users&action=reset">Đổi mật khẩu</a></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    get_footer();
    ?>