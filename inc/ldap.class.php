<?php

class Ldap
{
  private static $instance = false;
	private $ldap_controllers = array( "ger.corp.intel.com" );
	private $ldap_upn_domain = "@ger.corp.intel.com";
	private $ldap_connection = false;
	private $ldap_error = 0;
	
	private $service_login_user = "ec_sys_storage_sie";
	private $service_login_pass = "Gf4^6Rud";

	private function __construct()
	{
		$this->connect();
	}
  
  public static function getInstance() 
  {
		if ( !self::$instance ) 
    {
		  self::$instance = new self;
		}
		return self::$instance;
	}

	private function connect()
	{
		if( $this->ldap_connection )
		{
			return true;
		}
	
		$count = 0;

		while( $this->ldap_connection == false && $count < count( $this->ldap_controllers ) )
		{
			$this->ldap_connection = ldap_connect( $this->ldap_controllers[ $count ] , 3268 );

			if( !$this->ldap_connection )
			{
				$this->ldap_error = "Unable to login... The server said : " . ldap_error( $this->ldap_connection );
				$count++;             
			}
			else
			{
				ldap_set_option( $this->ldap_connection , LDAP_OPT_PROTOCOL_VERSION , 3 );
				ldap_set_option( $this->ldap_connection , LDAP_OPT_REFERRALS , 0 );
				
				if( ldap_bind( $this->ldap_connection , $this->service_login_user . $this->ldap_upn_domain , $this->service_login_pass ) === TRUE )
				{					
					return true;
				}
				else
				{
					$this->ldap_connection = false;
					return false;
				}
			}
		}
		
		return false;
	}
	
	public function getldapuser( $user )
	{
		$userobj = false;
		
		if( $this->connect() )
		{	
			$userobj = new LdapUser( array( $this->ldap_connection , $user ) );			
		}
		
		return $userobj;
	}
	
	public function getldapgroup( $group )
	{
		$groupobj = false;
		
		if( $this->connect() )
		{	
			$groupobj = new LdapGroup( array( $this->ldap_connection , $group ) );			
		}
		
		return $groupobj;
	}	
}