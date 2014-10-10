<?php

/**
 * AutomaticCache
 * Copyright (C) 2014 Karlsson & Lord AB
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category  KL
 * @package   AutomaticCache
 * @author    Tykhon Dziuban <tykhon@karlssonlord.com>
 * @copyright 2014 Karlsson & Lord AB
 * @license   LGPL v2.1 http://choosealicense.com/licenses/lgpl-v2.1/
 */
class KL_AutomaticCache_Model_Source_Days
{
    protected static $_options;

    const SUNDAY      = 0;
    const MONDAY      = 1;
    const TUESDAY     = 2;
    const WEDNESDAY   = 3;
    const THURSDAY    = 4;
    const FRIDAY      = 5;
    const SATURDAY    = 6;

    /**
     * Returns an array of week days
     *
     * @return array
     */
    public function toOptionArray()
    {
        if (!self::$_options) {
            self::$_options = array(
                array(
                    'label' => Mage::helper('cron')->__('SUNDAY'),
                    'value' => self::SUNDAY,
                ),
                array(
                    'label' => Mage::helper('cron')->__('MONDAY'),
                    'value' => self::MONDAY,
                ),
                array(
                    'label' => Mage::helper('cron')->__('TUESDAY'),
                    'value' => self::TUESDAY,
                ),
                array(
                    'label' => Mage::helper('cron')->__('WEDNESDAY'),
                    'value' => self::WEDNESDAY,
                ),
                array(
                    'label' => Mage::helper('cron')->__('THURSDAY'),
                    'value' => self::THURSDAY,
                ),
                array(
                    'label' => Mage::helper('cron')->__('FRIDAY'),
                    'value' => self::FRIDAY,
                ),
                array(
                    'label' => Mage::helper('cron')->__('SATURDAY'),
                    'value' => self::SATURDAY,
                ),
            );
        }
        return self::$_options;
    }

}
