<?php
/**
 * Check for invalidated caches and refreshs them
 */

class Ethan_CacheRefresh_Model_Observer {
    public function refresh() {
        $cacheInstance = Mage::app()->getCacheInstance();
        $caches = $cacheInstance->getInvalidatedTypes();
        if (!is_array($caches) || empty($caches)) return;
        foreach (array_keys($caches) as $cache) {
            Mage::app()->getCacheInstance()->cleanType($cache);
        }
    }
}