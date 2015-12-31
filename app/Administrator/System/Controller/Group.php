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
use hmvc\Validation\Validator;
use hmvc\Helpers\Redirect;
use App\Foundation\Security;
use hmvc\Http\JsonResponse;

/**
 * Package App\Administrator\System\Controller  
 * 
 * Class Group
 *
 * @author allen <allen@w4u.cn>
 */
class Group extends Controller {

    public function index() {
        $data['system_manager'] = true;
        $group_name = $this->request->get('group_name');
        $pagination = new Paginator($this->request->get('page'), 20, $this->request->query->all());
        $query = DB::table('usergroups')
                ->limit($pagination->getLimit(), $pagination->getOffset())
                ->orderBy('created_at DESC');
        if (!empty($group_name)) {
            $query->where('group_name', $group_name);
        }
        $data['groups'] = $query->get(\PDO::FETCH_OBJ);
        $data['pagination'] = $pagination->makeHtml(5);
        $data['jsvars'] = array(
            'token' => Security::getToken()
        );
        return View::make('admin/system/group-index', $data);
    }

    public function create() {
        $view = View::make('admin/system/group-create');
        $view->system_manager = true;
        return $view;
    }

    public function save() {
        $validator = Validator::make($this->request->request->all());
        $validator->addRule('group_name', 'required', array(
            'required' => '用户组必须填写',
        ));
        if (!$validator->validate()) {
            foreach ($validator->errors() as $value) {
                $this->session->addFlash('error', $value);
            }
            return Redirect::action('system/group/create');
        }
        $group_name = $this->request->get('group_name');
        $description = $this->request->get('description');
        $this->db()->insert('usergroups', array(
            'group_name' => $group_name,
            'description' => $description,
            'created_at' => time()
        ));
        return Redirect::action('system/group')->with('success', '添加成功');
    }

    public function update($id) {
        if (!$id) {
            return Redirect::action('system/group')->with('error', '用户组不存在');
        }
        if (!Security::checkToken($id)) {
            return Redirect::action('system/group')->with('error', 'token is invalid');
        }
        $validator = Validator::make($this->request->request->all());
        $validator->addRule('group_name', 'required', array(
            'required' => '用户组必须填写',
        ));
        if (!$validator->validate()) {
            foreach ($validator->errors() as $value) {
                $this->session->addFlash('error', $value);
            }
            return Redirect::action('system/group/edit', $id);
        }
        $group_name = $this->request->get('group_name');
        $description = $this->request->get('description');
        $this->db()->update('usergroups', array(
            'group_name' => $group_name,
            'description' => $description
                ), array(
            'group_id' => $id
        ));
        if ($this->db()->rowCount()) {
            return Redirect::action('system/group')->with('success', '用户组修改成功');
        } else {
            return Redirect::action('system/group')->with('error', '用户组修改失败');
        }
    }

    public function edit($id) {
        if (!$id) {
            return Redirect::action('system/group')->with('error', '用户组不存在');
        }
        $group = DB::table('usergroups')->where('group_id', $id)->first();
        if (empty($group)) {
            return Redirect::action('system/group')->with('error', '用户组不存在');
        }
        $view = View::make('admin/system/group-edit');
        $view->system_manager = true;
        $view->group = $group;
        $view->token = Security::getToken($id);
        $view->id = $id;
        return $view;
    }

    public function destroy($id) {
        if (!$id) {
            return JsonResponse::make(array(
                        'code' => 3002,
                        'message' => '用户组不存在'
                            ), 200);
        }
        if (!Security::checkToken()) {
            return JsonResponse::make(array(
                        'code' => 2001,
                        'message' => 'token is invalid'
                            ), 200);
        }
        $this->db()->delete('usergroups', array(
            'group_id' => $id
        ));

        $message = array(
            'code' => 0,
            'message' => '删除成功'
        );
        if ($this->db()->rowCount()) {
            $this->session->addFlash('success', '删除成功');
            return JsonResponse::make($message, 200);
        } else {
            $message['code'] = 3001;
            $message['message'] = '删除失败';
            return JsonResponse::make($message, 200);
        }
    }

}
