<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_New_Cowork_Table extends CI_Migration
{
    public function up()
    {
        // this up() migration is auto-generated, please modify it to your needs
        // Drop table 'cowork_master' if it exists
        $this->dbforge->drop_table('cowork_master', true);

        // Table structure for table 'cowork_master'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => false,
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('cowork_master');
    }

    public function down()
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->dbforge->drop_table('cowork_master', true);
    }
}