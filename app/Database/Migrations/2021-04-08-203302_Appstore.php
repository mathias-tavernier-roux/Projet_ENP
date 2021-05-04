<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Appstore extends Migration
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
			'version'       => [
				'type'       => 'VARCHAR',
				'constraint' => '6',
			],
			'type'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('appstore');
	$db = \Config\Database::connect('default');
	$builder = $db->table('permission');
	$builder->insert($data);
	$data = [
		'name' => 'Appstore',
		'app'  => 'Appstore',
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
		$this->forge->dropTable('appstore');
		$db = \Config\Database::connect('default');
		$builder = $db->table('permission');
		$builder->delete(['app' => "Appstore"]);
	}
}
