<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AppPage extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'app_name'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'page'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'shortcut_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '300',
			],
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('apppage');
	}
	public function down()
	{
		//
		$this->forge->dropTable('apppage');
	}
}
