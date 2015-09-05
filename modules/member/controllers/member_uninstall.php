<?php
/**
*
* Block comment
*
**/

class member_uninstall extends admin_controller {
	
	
	public $module_system_name = 'member';

	
	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
		// uninstall module
		// if ( $this->db->table_exists( 'accounts_detail' ) ) {

		// 	$sql = 'DROP TABLE `'.$this->db->dbprefix('accounts_detail').'`;';
		// 	$this->db->query( $sql );

		// }



		
		// uninstall
		$this->db->set( 'module_install', '0' );
		$this->db->where( 'module_system_name', $this->module_system_name );
		$this->db->update( 'modules' );
		// disable too
		$this->load->model( 'modules_model' );
		$this->modules_model->do_deactivate( $this->module_system_name );
		echo 'Uninstall completed. <a href="'.site_url( 'site-admin/module' ).'" >Go back</a>';
	}
	

}

