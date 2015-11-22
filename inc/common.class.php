<?php

class Common
{
  private static $instance = false;
	public $current_user = null;
	protected $docroot = null;
	protected $userimages = array();

	private function __construct()
	{
		$parts = explode( "/" , str_replace( "\\" , "/" , __FILE__ ) );
		array_pop( $parts );
		array_pop( $parts );
		$path = implode( "/" , $parts );
		
		$this->docroot = $path . "/";
		
		$this->prepare();
		$this->userimages = glob( $this->docroot . "images/users/*.jpg" );
	}
  
  public static function getInstance() 
  {
		if ( !self::$instance ) 
    {
		  self::$instance = new self;
		}
		return self::$instance;
	}
	
	private function prepare()
	{
		if( isset( $_SERVER[ 'PHP_AUTH_USER' ] ) || isset( $_SERVER[ 'AUTH_USER' ] ) )
		{
			$authuser = isset( $_SERVER[ 'PHP_AUTH_USER' ] ) ? $_SERVER[ 'PHP_AUTH_USER' ] : $_SERVER[ 'AUTH_USER' ];
			
			if( stristr( $authuser , "\\" ) )
			{
				$authuser = substr( $authuser , strpos( $authuser , "\\" ) + 1 );
        $authuser = stripslashes( $authuser );        
			}
		}
    
		$this->current_user = Ldap::getInstance()->getldapuser( $authuser );			
	}

	public function getuserimage( $idsid )
	{		
    if( $idsid != $this->current_user->samaccountname )
    {
      Ldap::getInstance()->getldapuser( $idsid );
    }
    
		if( in_array( $this->docroot . "images/users/" . $idsid . ".jpg" , $this->userimages ) )
		{
			return "images/users/" . $idsid . ".jpg";
		}
		else
		{
			return "images/person.png";
		}
	}
}
