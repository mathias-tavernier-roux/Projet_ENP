<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Group extends Migration
{
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
			'pole'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'taille'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'link_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('group');
	$db = \Config\Database::connect('default');
	$builder = $db->table('permission');
	$data = [
		'name' => 'List Groups',
		'app'  => 'Groups',
		'page'  => 'index',
		'variant' => '',
		'group'  => 'SYSTEM',
		'role'  => 'ADMIN',
		'type'  => 'SYSTEM',
	];
	$builder->insert($data);
	}

	public function down()
	{
		// Erase The Table : WARNING, THIS ALSO ERASE DATA | Uninstallation
		$this->forge->dropTable('group');
		$db = \Config\Database::connect('default');
		$builder = $db->table('permission');
		$builder->delete(['app' => "Groups"]);
	}
}
