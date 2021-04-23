<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class System extends Migration
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
			'complete_name'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'little_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '6',
			],
			'version_systeme'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'default' => "Beta : 0.1.0 : CORE ONLY",
			],
			'version_framework'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'default' => "4.1.1",
			],
			'unlock' => [
					'type' => 'BOOLEAN',
					'default' => false,
			],
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('system');
	$db = \Config\Database::connect('default');
	$builder = $db->table('permission');
	$data = [
		'name' => 'System Info',
		'app'  => 'System',
		'page'  => 'index',
		'variant' => '',
		'group'  => 'SYSTEM',
		'role'  => 'ADMIN',
		'type'  => 'SYSTEM',
	];
	$builder->insert($data);
	$data = [
		'name' => 'Update System',
		'app'  => 'System',
		'page'  => 'update',
		'variant' => '',
		'group'  => 'SYSTEM',
		'role'  => 'ADMIN',
		'type'  => 'SYSTEM',
	];
	$builder->insert($data);
	$data = [
		'name' => 'Core Unlock',
		'app'  => 'System',
		'page'  => 'CORE_UNLOCK_PROCEDURE',
		'variant' => '',
		'group'  => 'SYSTEM',
		'role'  => 'ADMIN',
		'type'  => 'SYSTEM',
	];
	$builder->insert($data);
	$data = [
		'name' => 'Appstore',
		'app'  => 'System',
		'page'  => 'appstore',
		'variant' => '',
		'group'  => 'SYSTEM',
		'role'  => 'ADMIN',
		'type'  => 'SYSTEM',
	];
	$builder->insert($data);
	}

	public function down()
	{
		//
		$this->forge->dropTable('system');
		$db = \Config\Database::connect('default');
		$builder = $db->table('permission');
		$builder->delete(['app' => "System"]);
	}
}
