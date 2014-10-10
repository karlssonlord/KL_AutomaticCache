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
class KL_AutomaticCache_Model_Cron extends Varien_Object
{
    /**
     * Runs cache flushing
     *
     * @return void
     */
    public function run()
    {
        $tagsArray = explode(',', Mage::getStoreConfig('kl_automaticcache/settings/tags'));
        Mage::app()->getCache()->clean(Zend_Cache::CLEANING_MODE_MATCHING_ANY_TAG, $tagsArray);
    }
}