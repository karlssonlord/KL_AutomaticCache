# KL_AutomaticCache

On a daily basis some of the caches in Magento needs to be flushed. You should be able with the module config in admin to set what caches to be flushed and also what time of day it should be flushed.
The main reason is that some data is cached to hard by Magento and not flushed in time. This way we can assure that the cache is fresh in the morning.

## Features

* You can select your custom time in the backend to run the CRON job