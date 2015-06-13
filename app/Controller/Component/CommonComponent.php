<?php 
App::uses('Component', 'Controller');
class CommonComponent extends Component {
    
	public function createDir($dir) {
        if (trim($dir) == "")
            return false;
        if (is_dir($dir) == false) {
            return mkdir($dir, 0777);
        }
        return false;
    }

    function images($files = array(), $dir =''){
		$file = '';
		$file_path ='';
		foreach ($files as $key => $file) {
			if($file){
				$file_path = WWW_ROOT.DIR_IMAGE.$dir.$file;
				if(file_exists($file_path)){
					return $this->base.FS.DIR_IMAGE.$dir.$file.'" ref="'.$this->base.FS.DIR_IMAGE.DIR_PRODUCT.$file;
				}
			}
		}			
		return $this->base.FS.DIR_IMAGE.NO_IMAGE;
	}
}
 ?>

