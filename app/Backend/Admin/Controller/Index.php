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

namespace App\Backend\Admin\Controller;

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
        $p = new \hmvc\Component\Paginator($this->request->get('page', 1), $this->request->get('limit', 20));
        $p->setTotal(2000);
        $p->setData($this->request->query->all());
        return \hmvc\View\View::make('admin/hello', array(
                    'page' => $p->makeHtml(5)
        ));
    }

    public function show($id) {
        
    }

    public function save() {
        echo 'save';
//        echo $this->request->getPathInfo();
    }

}
