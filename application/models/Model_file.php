<?php 
class Model_file extends CI_Model implements DatatableModel{
    	
    	function __construct(){
    		parent::__construct();
    	}

		public function appendToSelectStr() {
				return NULL;
		}
    	
		public function fromTableStr() {
			return 'file f';
		}
    
	    public function joinArray(){
	    	return NULL;
	    }
	    
    	public function whereClauseArray(){
    		$id=$this->uri->segment(3);
    		if(isset($id)){
    			return array(
    						'f.folder'=>$id
    					);
    		}else{
    			return NULL;
    		}
    		
    	}
   }
 ?>