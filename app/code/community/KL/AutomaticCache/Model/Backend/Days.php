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
class KL_AutomaticCache_Model_Backend_Days extends Mage_Core_Model_Config_Data
{
    const CRON_STRING_PATH  = 'crontab/jobs/automatic_cache/schedule/cron_expr';

    /**
     * Saves CRON expression into core_config_data
     *
     * @return void
     * @throws Exception
     */
    protected function _afterSave()
    {
        $days = $this->getData('groups/settings/fields/days/value');
        $time = $this->getData('groups/settings/fields/time/value');

        $cronExprArray      = array(
            0,                                                   # Minute
            intval($time[0]),                                    # Hour
            '*',                                                 # Day of the Month
            '*',                                                 # Month of the Year
            implode(',', $days),                                 # Day of the Week
        );

        $cronExprString     = join(' ', $cronExprArray);

        try {
            Mage::getModel('core/config_data')
                ->load(self::CRON_STRING_PATH, 'path')
                ->setValue($cronExprString)
                ->setPath(self::CRON_STRING_PATH)
                ->save();
        } catch (Exception $e) {
            throw new Exception(Mage::helper('cron')->__('Unable to save the cron expression.'));
        }
    }
}