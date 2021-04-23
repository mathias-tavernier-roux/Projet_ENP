<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Permission extends Migration
{
	protected $DBGroup = 'system';
	public function up()
	{
		// Create The Table : Installation
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'auto_increment' => true,
				'unsigned'       => true,
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'app'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'page'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'variant'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'group'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'role'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'type'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('permission');
	$db = \Config\Database::connect('default');
	$builder = $db->table('permission');
	$data = [
		'name' => 'Gestion des Permission',
		'app'  => 'System',
		'page'  => 'permissions',
		'variant' => '',
		'group'  => 'SYSTEM',
		'role'  => 'ADMIN',
		'type'  => 'ROOT',
	];
	$builder->insert($data);
	}

	public function down()
	{
		//
		$this->forge->dropTable('permission');
	}
}
