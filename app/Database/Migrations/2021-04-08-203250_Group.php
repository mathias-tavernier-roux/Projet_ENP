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
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('group');
	}

	public function down()
	{
		// Erase The Table : WARNING, THIS ALSO ERASE DATA | Uninstallation
		$this->forge->dropTable('group');
	}
}
