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
        return ['satus => SUCCESS'];
    }

    public function get_all_clients()
    {
        
    }

    public function get_all_products()
    {
        
    }
}
