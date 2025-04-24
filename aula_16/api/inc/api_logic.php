<?php 
class api_logic 
{
    private $endpoint;
    private $params;
    
    //------------------------------------
    public function __construct($endpoint, $params = null)
    {
        //define the object/class propreties
        $this -> endpoint = $endpoint;
        $this -> params = $params;
    }
    
    //------------------------------------
    
    public function endpoint_exists() 
    {
        //Check if the endpoint is a valid class method
        
        return method_exists($this, $this->endpoint); 
    }
    
    //------------------------------------
    //ENDPOINTS
    //------------------------------------
    public function status()
    {
        return ['satus => SUCCESS',
                'message' => 'API is runnig OK!',
                'results' => null
        ];
        
    }
//------------------------------------

    public function get_all_clients()
    {
        //returns all clients for our database
        $sql = "SELECT * FROM cliente WHERE 1 ";
        $db = new database();
        
        //chech if only_active exists and true
        if(key_exists('only_active', $this->params)){
            if(filter_var($this->params['only_active'], FILTER_VALIDATE_BOOLEAN)){
                $sql .= "AND delete_at IS NULL";
            }
        }
        $results = $db->EXE_QUERY($sql);
        
        return [
            'status' => 'SUCCESS',
            'message'=> '',
            'results' => $results
        ];
    }
//------------------------------------

    public function get_all_products()
    {
        //return all products in the database
    
        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM produto ");
        
        return [
            'status' => 'SUCCESS',
            'message'=> '',
            'results' => $results,
                
        ];
    }
}