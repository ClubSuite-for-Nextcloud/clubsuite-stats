<?php
namespace OCA\ClubSuiteStats\Migrations;

use OCP\AppFramework\Db\SchemaTrait;
use OCP\Migration\IMigration;
use OCP\Migration\IOutput;

class Version20260105_AddIndexes implements IMigration {
    use SchemaTrait;

    public function changeSchema(IOutput $output) {
        $schema = $this->getSchema();
        if ($schema->hasTable('core_member')) {
            $t = $schema->getTable('core_member');
            if (!$t->hasIndex('idx_core_member_created')) $t->addIndex(['created_at'], 'idx_core_member_created');
        }
        if ($schema->hasTable('finanzen_transaction')) {
            $t = $schema->getTable('finanzen_transaction');
            if (!$t->hasIndex('idx_finanzen_transaction_date')) $t->addIndex(['date'], 'idx_finanzen_transaction_date');
        }
        if ($schema->hasTable('sitzungen_meeting')) {
            $t = $schema->getTable('sitzungen_meeting');
            if (!$t->hasIndex('idx_sitzungen_meeting_date')) $t->addIndex(['date'], 'idx_sitzungen_meeting_date');
        }
        if ($schema->hasTable('inventar_item')) {
            $t = $schema->getTable('inventar_item');
            if (!$t->hasIndex('idx_inventar_item_category')) $t->addIndex(['category_id'], 'idx_inventar_item_category');
        }
    }

    public function up(IOutput $output) { $this->changeSchema($output); }
    public function down(IOutput $output) { }
}
