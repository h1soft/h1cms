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

namespace App\Foundation;

/**
 * Package App\Foundation  
 * 
 * Class Form
 *
 * @author allen <allen@w4u.cn>
 */
class Form {

    public function __construct() {
        
    }

    public static function token($fixValue = '', $isFlash = false) {
        return Security::getToken($fixValue, $isFlash);
    }

    public static function open($action, $name = 'appForm', $method = 'GET', $params = array()) {
        $other_method = (strtoupper($method) != 'GET' && strtoupper($method) != 'POST');
        echo '<form name="', $name, '" id="', $name, '" ';
        echo ' action="', $action, '" ';
        echo 'method="', ($other_method ? 'POST' : $method) . '" >', "\n";
        if ($other_method) {
            echo '<input name="_method" type="hidden" value="', $method, '" />', "\n";
        }
        if (isset($params['flashToken'])) {
            $token = Security::getToken($params['flashToken'], true);
            echo '<input name="token" type="hidden" value="', $token, '" />', "\n";
        } else if (isset($params['token'])) {
            $token = Security::getToken($params['token']);
            echo '<input name="_method" type="hidden" value="', $token, '" />', "\n";
        }
    }

    public static function end() {
        echo '</form>';
    }

}
