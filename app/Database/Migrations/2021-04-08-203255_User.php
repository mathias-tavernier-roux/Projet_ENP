<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'auto_increment' => true,
				'unsigned'       => true,
			],
			'first_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'last_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'birth'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'login'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'group_id'          => [
				'type'           => 'INT',
				'constraint'     => 255,
				'unsigned'       => true,
			],
			'role_id'          => [
				'type'           => 'INT',
				'constraint'     => 255,
				'unsigned'       => true,
			],
			'role_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'group_name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
		$db = \Config\Database::connect('default');
		$builder = $db->table('permission');
		$data = [
			'name' => 'My Account',
			'app'  => 'Users',
			'page'  => 'index',
			'variant' => '',
			'group'  => 'ALL',
			'role'  => 'ALL',
			'type'  => 'SYSTEM',
		];
		$builder->insert($data);
		$data = [
			'name' => 'List ALL Users',
			'app'  => 'Users',
			'page'  => 'list',
			'variant' => 'ALL',
			'group'  => 'SYSTEM',
			'role'  => 'ADMIN',
			'type'  => 'SYSTEM',
		];
		$builder->insert($data);
	}

	public function down()
	{
		//
		$this->forge->dropTable('user');
		$db = \Config\Database::connect('default');
		$builder = $db->table('permission');
		$builder->delete(['app' => "Users"]);
	}
}
