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
}
 ?>

