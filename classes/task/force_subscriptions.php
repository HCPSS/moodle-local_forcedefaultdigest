<?php

namespace local_forcedefaultdigest\task;

use core\task\scheduled_task;

class force_subscriptions extends scheduled_task {

    /**
     * @var \moodle_database
     */
    private $db;

    public function __construct() {
        global $DB;
        $this->db = $DB;
    }

    /**
     * {@inheritDoc}
     * @see \core\task\scheduled_task::get_name()
     */
    public function get_name() {
        return get_string('force_subscriptions', 'local_forcedefaultdigest');
    }

    /**
     * {@inheritDoc}
     * @see \core\task\task_base::execute()
     */
    public function execute() {
        if ($config = get_config('local_forcedefaultdigest', 'forums')) {
            $ids = explode(',', $config);

            foreach ($ids as $id) {
                $this->db->delete_records('forum_digests', array('forum' => $id));
            }
        }
    }
}
