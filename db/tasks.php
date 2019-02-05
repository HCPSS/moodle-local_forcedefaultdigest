<?php

defined('MOODLE_INTERNAL') || die();

$tasks = array(
    array(
        'classname' => 'local_forcedefaultdigest\task\force_subscriptions',
        'blocking'  => 0,

        // Run this task every 10 minutes.
        'minute'    => '10-59/10',
        'hour'      => '*',
        'day'       => '*',
        'dayofweek' => '*',
        'month'     => '*',
    ),
);
