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
 * Class Setting
 *
 * @author allen <allen@w4u.cn>
 */
class Setting {

    /**
     *
     * @var \hmvc\Database\Connection
     */
    private $db;
    private $setting = array();

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll($group = '') {
        if ($group) {
            $group = " WHERE " . $this->db->quoteColumn('group') . "='$group'";
        }
        return $this->db->getAll("select * from {setting} " . $group . ' order by sort_order asc');
    }

    public function addGroup($name, $title, $sort_order = 0) {
        $this->db->insert('setting', array(
            'group' => '_sys_settingtabs',
            'key' => $name,
            'sort_order' => $sort_order,
            'value' => $title
        ));
    }

    public function addSetting($group, $key, $value, $title, $sort_order = 0, $type = 'text', $options = array()) {
        $this->db->insert('setting', array(
            'group' => $group,
            'key' => $key,
            'value' => $value,
            'title' => $title,
            'sort_order' => $sort_order,
            'htmltype' => $type,
            'options' => json_encode($options)
        ));
    }

    /**
     * 
     * @param string $group_name
     * @return \App\Foundation\Setting
     */
    public function load($group_name) {
        $settings = $this->db->getAll("select * from {setting} where {$this->db->quoteColumn('group')}=:group_name order by sort_order asc", array('group_name' => $group_name));
        foreach ($settings as $value) {
            $this->setting[$value['group']][$value['key']] = $value['value'];
        }
        return $this;
    }

    /**
     * 
     * @param string $key
     * @return \App\Foundation\Setting
     */
    public function group($key) {
        if (isset($this->setting[$key])) {
            return $this->setting[$key];
        } else {
            $this->load($key);
            return isset($this->setting[$key]) ? $this->setting[$key] : array();
        }
    }

    /**
     * 
     * @param string $key
     * @return \App\Foundation\Setting
     */
    public function get($key) {
        $skey = explode('.', $key);
        if (count($skey) == 2) {
            if (!isset($this->setting[$skey[0]])) {
                $this->load($skey[0]);
            }

            if (isset($this->setting[$skey[0]][$skey[1]])) {
                return $this->setting[$skey[0]][$skey[1]];
            }
        } else {
            return $this->group($key);
        }
        return NULL;
    }

    public function save($group, $config) {
        if (!is_array($config)) {
            return false;
        }
        $settings_rs = $this->db->getAll("select * from {setting} where {$this->db->quoteColumn('group')}=:group_name", array('group_name' => $group));
        $settings = array();
        foreach ($settings_rs as $value) {
            $settings[$value['key']] = $value['value'];
        }
        foreach ($config as $key => $value) {
            $serialized = 0;
            if (!is_string($value)) {
                $value = serialize($value);
                $serialized = 1;
            }
            if (isset($settings) && key_exists($key, $settings)) {
                $this->db->update('setting', array('value' => $value), array('group' => $group, 'key' => $key));
            } else {
                $this->db->insert('setting', array(
                    'value' => $value,
                    'group' => $group,
                    'key' => $key,
                    'serialized' => $serialized
                ));
            }
        }
    }

}
