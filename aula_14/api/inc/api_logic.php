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

    public function get_all_clients()
    {
        //query to the database

        return [
            'status' => 'SUCCESS',
            'message'=> '',
            'results' => [
                'joao', 'ana','pedro','antonio'
            ]
        ];
    }

    public function get_all_products()
    {
        return [
            'status' => 'SUCCESS',
            'message'=> '',
            'results' => [
                'laranja', 'ananas','martelo','parafuso'
            ]
        ];
    }
}
