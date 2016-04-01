<?php 

include_once '..Models/ElectromerModel.php';

class CreateElectromer
{
	protected $electromerDatas;
	
	public function __construct()
	{
	//	if( !empty( $_))
		
	//	..... 'insert 
		
		if( !empty( $_POST ) )
		{
			$this->electromerDatas = array(
				'NomerElektr' => $_POST['id'],
				'dayRateValue'=> $_POST['dayRateValue'],
				'nightRateValue' => $_POST['nightRateValue']
						
			);
			
		}
	}
	
	public function create()
	{
		$electromerModel = new ElectromerModel();
		
		$electromerModel->createElectromer( $this->electromerDatas );
		
	}
		
	public function renderForm()
	{
		$form = file_get_contents( __DIR__ . '../Views/createElectromer.html');
		
		print $form;
		
	}
	
	
	
}









?>