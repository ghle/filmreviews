<?php 

	namespace app\admin\controller;

	use app\admin\Controller;

	class Template extends Controller
	{
		

		public function base()
		{
			if ($this->request->isAjax()) {

				$res=db('category')->select();

				$this->return_msg(200,'ddd',$res);

			}else{
				return $this->fetch('base');
			}
			
			
		}
		
		
	}






 ?>