<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mmyers
 * Date: 7/23/13
 * Time: 11:08 AM
 * To change this template use File | Settings | File Templates.
 */

set_include_path('/home/n00748663/homepage/group2/inc');
include("../config/Configurations.php");

class Database {
    protected $_connection;

    protected $_config;
    // pass a custom config array like so...
    // 'driver' => 'mysql', //(Or other driver)
    // 'host' => 'host',
    // 'dbname' => 'dpname',
    // 'username' => 'dbusername',
    // 'password' => 'dbpassword'

    public function __construct(array $config = null){

        if (is_null($config)){
            $this->config = array('driver'=>DB_DRIVER,'host' =>DB_HOST,'dbname'=>DB_NAME,
                'username'=>DB_REGULAR_USER,'password'=>DB_REGULAR_PASS);
        }else{
            $this->_config = $config;
        }
    }

    public function voidQuery($query,$query_params){
        try{
            if($query_params === 0){
                $stmt = $this->_getConnection()->prepare($query);
                $result = $stmt->execute();
            }else{
                $stmt = $this->_getConnection()->prepare($query);
                $result = $stmt->execute( $query_params );
            }
        }catch(PDOException $ex){
            die("Failed to run query: ".$ex->getMessage());
        }
    }

    public function query( $query, $query_params, $multipleRows = 0 )
    {
        try{
            if($query_params === 0){
                $stmt = $this->_getConnection()->prepare($query);
                $result = $stmt->execute();
            }else{
                $stmt = $this->_getConnection()->prepare($query);
                $result = $stmt->execute( $query_params );
            }
            if($multipleRows){
                return ($result) ? $stmt->fetchAll() : null;
            }else{
                return ($result) ? $stmt->fetch() : null;
            }
        }catch(PDOException $ex){
            die("Failed to run query: ".$ex->getMessage());
        }
    }

    public function queryList($query, $query_params){
        try{
            $stmt = $this->_getConnection()->prepare($query);
            //$stmt->setFetchMode(PDO::FETCH_CLASS, 'ListHandler');
            $result = $stmt->execute($query_params);
            return ($result) ? $stmt->fetchAll() : null;
        }catch(PDOException $ex){
            die("Failed! ".$ex->getMessage());
        }
    }

    protected function _getConnection()
    {
        // lazy load connection
        if( $this->_connection === null ){
            $dsn = "".$this->config['driver'].":host=".$this->config['host'].";dbname=".$this->config['dbname'].";charset=utf8";
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            try
            {
                $this->_connection = new PDO( $dsn, $this->config[ 'username' ], $this->config[ 'password' ], $options );
            }
            catch( PDOException $e )
            {
                echo "failed to connect ".$e->getMessage();

                /* handle failed connecting */
            }
        }

        return $this->_connection;
    }
}
