<?php
namespace app\admin\controller;

class AdminUser extends Base {
    public function profile() {
        return $this->fetch();
    }
}
?>