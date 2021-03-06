<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'hierarchy'          => [
				'type'           => 'INT',
			],
			'name'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
			],
			'description' => [
					'type' => 'TEXT',
					'null' => true,
			],
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('role');
	$db = \Config\Database::connect('default');
	$builder = $db->table('permission');
	$data = [
		'name' => 'List ALL Role',
		'app'  => 'Statuts',
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
		//
		$this->forge->dropTable('role');
		$db = \Config\Database::connect('default');
		$builder = $db->table('permission');
		$builder->delete(['app' => "Statuts"]);
	}
}
