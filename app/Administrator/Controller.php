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

namespace App\Administrator;

use hmvc\Routing\Controller as BaseController;
use hmvc\Helpers\Redirect;
use hmvc\Core\Config;
use hmvc\Core\Definition;

/**
 * Package App\Administrator  
 * 
 * Class Controller
 *
 * @author allen <allen@w4u.cn>
 */
class Controller extends BaseController {

    public function init() {
        if (!$this->session->get('_h1cms_user', false)) {
            Redirect::action('system/login')->send();
            exit();
        }
        Config::set('view.default', 'default');
    }

}
