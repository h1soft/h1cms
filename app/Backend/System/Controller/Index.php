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

namespace App\Backend\System\Controller;

use hmvc\Routing\Controller;

/**
 * Description of Hello
 *
 * @author Administrator
 */
class Index extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        echo app()->get('hmvcDispatch')->prefix;
        echo app()->get('hmvcDispatch')->moduleName;
        echo app()->get('hmvcDispatch')->controllerName;
//        return \hmvc\Helpers\Redirect::to('/hmvc/framework/administrator/admin/index/1')->with('notice', 'haha this is a message');
    }

    public function show($id) {
        pp($this->session->getFlash('notice'));
        echo <<<EOF
        <!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
  </head>
  <body>
    <h1>你好，世界！</h1>
<input type="button" value="ajax" onclick="test();" />
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script>
   function test(){
       $.get("/hmvc/framework/administrator/admin/index");
        }
        function Hello(data){
        console.log(data);
        }
   </script>
  </body>
</html>
EOF;
    }

    public function save() {
        echo 'save';
//        echo $this->request->getPathInfo();
    }

}
