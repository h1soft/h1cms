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

use App\Administrator\Controller;
use hmvc\View\View;
use hmvc\Component\Paginator;
use hmvc\Database\DB;
use hmvc\Helpers\Str;
use App\Foundation\Acl;
use hmvc\Helpers\Redirect;
use hmvc\Validation\Validator;
use App\Foundation\Security;

/**
 * Package App\Administrator\System\Controller  
 * 
 * Class User
 *
 * @author allen <allen@w4u.cn>
 */
class User extends Controller {

    public function index() {
        $data['system_manager'] = true;
        $email = $this->request->get('email');
        $pagination = new Paginator($this->request->get('page'), 20, $this->request->data());
        $query = DB::table('users as u')->select("u.*,ug.group_name")
                ->leftJoin('usergroups as ug', 'u.group_id=ug.group_id')
                ->limit($pagination->getLimit(), $pagination->getOffset());
        if (Str::isEmail($email)) {
            $query->where('email', $email);
        }
        $data['users'] = $query->get(\PDO::FETCH_OBJ);
        $data['pagination'] = $pagination->makeHtml(5);
        return View::make('admin/system/user-index', $data);
    }

    public function create() {
        $view = View::make('admin/system/user-create');
        $view->system_manager = true;
        $view->groups = \App\Group::findAll();
        return $view;
    }

    public function save() {
        $validator = Validator::make($this->request->request->all());
        $validator->addRule('group_id', 'required', array(
            'required' => '必须选择用户组',
        ));
        $validator->addRule('email', 'required|email', array(
            'required' => '用户名必须填写', 'email' => '请输入正确的Email'
        ));
        $validator->addRule('password', 'required|same_as[repassword]|len[6,16]', array(
            'required' => '密码必须填写', 'len' => '密码长度必须在6-16个字符', 'same_as' => '两次输入的密码不同'
        ));

        if (\App\User::findByEmail($this->request->get('email')) != NULL) {
            $validator->addError('email', '用户名已经存在');
        }
        if (!$validator->validate()) {
            foreach ($validator->errors() as $value) {
                $this->session->addFlash('error', $value);
            }
            return Redirect::action('system/user/create');
        }
        try {
            $user = \App\User::create(array(
                        'group_id' => $this->request->get('group_id'),
                        'email' => $this->request->get('email'),
                        'fullname' => $this->request->get('fullname'),
                        'description' => $this->request->get('description'),
                        'password' => Security::password($this->request->get('password')),
                        'created_at' => time(),
            ));
        } catch (\Exception $exc) {
            
        }
        //添加失败
        if (empty($user)) {
            return Redirect::action('system/user')->with('error', '添加失败');
        }
        
        return Redirect::action('system/user')->with('success', '用户' . $user->email . '添加成功');
    }

    public function show($id) {
        
    }

    /**
     * 退出
     * @return Response
     */
    public function logout() {
        Acl::logout();
        return Redirect::action('system/login');
    }

}
