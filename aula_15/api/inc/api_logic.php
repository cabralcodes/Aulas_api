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

        $db = new database();
        $results = $db->EXE_QUERY("SELECT * FROM cliente ");
        
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
