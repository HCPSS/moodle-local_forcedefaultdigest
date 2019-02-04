<?php

namespace local_forceindividualemails\task;

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
        return get_string('force_subscriptions', 'local_forceindividualemails');
    }

    /**
     * {@inheritDoc}
     * @see \core\task\task_base::execute()
     */
    public function execute() {
        if ($config = get_config('local_forceindividualemails', 'forums')) {
            $ids = explode(',', $config);

            foreach ($ids as $id) {
                $this->db->delete_records('forum_digests', array('forum' => $id));
            }
        }
    }
}
