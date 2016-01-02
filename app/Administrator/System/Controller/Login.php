<?php

/*
 * Copyright (C) 2014 Allen Niu <h@h1soft.net>

 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.



 * This file is part of the hmvc package.
 * (w) http://www.hmvc.cn
 * (c) Allen Niu <h@h1soft.net>

 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.


 */

namespace App\Administrator\System\Controller;

use hmvc\Routing\Controller;
use hmvc\View\View;
use hmvc\Core\Config;
use hmvc\Helpers\Redirect;
use hmvc\Session\Session;
use hmvc\Validation\Validator;

/**
 * Admin login
 *
 * @author allen <allen@w4u.cn>
 */
class Login extends Controller {

    public function beforeAction() {
        parent::beforeAction();
        Config::set('view.default', 'default');
    }

    public function index() {
        return View::make('admin/login');
    }

    public function save(Session $session) {
        $validator = Validator::make($this->request->request->all());
        $validator->addRule('email', 'required|email', array(
            'required' => '用户名必须填写',
            'email' => '必须填写合法的Email'
        ));
        $validator->addRule('password', 'required|len[6,16]', '密码', array(
            'required' => '密码必须填写',
            'len' => '密码格式不正确'
        ));
        if (!$validator->validate()) {
            foreach ($validator->errors() as $value) {
                $session->addFlash('error', $value);
            }
            return Redirect::action('system/login');
        }
        $email = $this->request->get('email');
        $password = $this->request->get('password');
        $user = \App\User::findByEmail($email);
        if ($user != NULL && \App\Foundation\Security::checkPassword($password, $user->password)) {
            $session->set('_h1cms_user_id', $user->id);
            $session->set('_h1cms_user_email', $email);
            return Redirect::action('system/dashboard')->with('success', '登录成功');
        } else {
            return Redirect::action('system/login')->with('error', '登录失败');
        }
    }

}
