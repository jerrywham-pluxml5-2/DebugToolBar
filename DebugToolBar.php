<?php
class DebugToolBar extends plxPlugin {
	
	public function __construct($default_lang) {
		
		# appel du constructeur de la classe sigPlugin (obligatoire)
		parent::__construct($default_lang);
		
		# Déclarations des hooks
		# Partie publique
		if(!defined('PLX_ADMIN')) {
			$this->addHook('plxMotorDemarrageEnd', 'addDebugToolBar');
		} 
		# Partie administration
		else {
			$this->addHook('plxMotorConstructLoadPlugins', 'addDebugToolBar');
		}
		$this->addHook('AdminFootEndBody', 'printToolBar');
		$this->addHook('ThemeEndBody', 'printToolBar');
	}
	public function addDebugToolBar() {
		include_once(PLX_PLUGINS.'DebugToolBar/class_outils_debug.php');
	}

	public function printToolBar() {
		Debug::getInstance()->printBar();
	}
	
}


?>
