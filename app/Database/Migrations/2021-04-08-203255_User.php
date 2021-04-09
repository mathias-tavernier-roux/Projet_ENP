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
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('user');
	}

	public function down()
	{
		//
		$this->forge->dropTable('user');
	}
}
