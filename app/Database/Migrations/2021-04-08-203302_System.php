<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class System extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'complete_name'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'little_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '6',
			],
			'version'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'unlock' => [
					'type' => 'BOOLEAN',
					'default' => false,
			],
			'admin_login'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'admin_password'       => [
			'type'       => 'VARCHAR',
			'constraint' => '100',
			],
	]);
	$this->forge->createTable('system');
	}

	public function down()
	{
		//
		$this->forge->dropTable('system');
	}
}
