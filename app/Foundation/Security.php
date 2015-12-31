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

use hmvc\Core\Config;

/**
 * Package app\Foundation  
 * 
 * Class Security
 *
 * @author allen <allen@w4u.cn>
 */
class Security {

    /**
     * Encrypt Password
     * @param type $password
     * @return type
     */
    public static function password($password) {
        return hash('sha256', Config::get('security.key', 'h1cms') . $password);
    }

    /**
     * check password
     * @param type $password
     * @param type $hash
     * @return type
     */
    public static function checkPassword($password, $hash) {
        return ($hash == self::password($password));
    }

    public static function getToken($fixValue = '', $isFlash = false) {
        $salt = mt_rand();
        $token = hash('sha1', Config::get('security.key', 'h1cms') . $fixValue . $salt);
        app()->get('session')->set('security.csrf.slat', $salt);
        if ($isFlash) {
            app()->get('session')->addFlash('security.csrf.token', $token);
        } else {
            app()->get('session')->set('security.csrf.token', $token);
        }
        return $token;
    }

    public static function checkToken($fixValue = '') {
        $salt = app()->get('session')->get('security.csrf.slat');
        $token = app()->get('session')->get('security.csrf.token');
        if (empty($token)) {
            $tokens = app()->get('session')->getFlash('security.csrf.token');
            $token = array_get($tokens, 0, NULL);
        }
        return hash('sha1', Config::get('security.key', 'h1cms') . $fixValue . $salt) == $token;
    }

}
