<?php
 /*
 * Project:		EQdkp-Plus
 * License:		Creative Commons - Attribution-Noncommercial-Share Alike 3.0 Unported
 * Link:		http://creativecommons.org/licenses/by-nc-sa/3.0/
 * -----------------------------------------------------------------------
 * Began:		2009
 * Date:		$Date$
 * -----------------------------------------------------------------------
 * @author		$Author$
 * @copyright	2006-2011 EQdkp-Plus Developer Team
 * @link		http://eqdkp-plus.com
 * @package		eqdkp-plus
 * @version		$Rev$
 * 
 * $Id$
 */

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found');exit;
}

if(!class_exists('daoc')) {
	class daoc extends game_generic {
		public $version			= '2.0';
		protected $this_game	= 'daoc';
		protected $types		= array('classes', 'races', 'factions', 'filters');
		protected $classes		= array();
		protected $races		= array();
		protected $factions		= array();
		protected $filters		= array();
		public $langs			= array('english');

		protected $class_dependencies = array(
			array(
				'name'		=> 'faction',
				'type'		=> 'factions',
				'admin' 	=> true,
				'decorate'	=> false,
				'parent'	=> false,
			),
			array(
				'name'		=> 'race',
				'type'		=> 'races',
				'admin'		=> false,
				'decorate'	=> true,
				'parent'	=> array(
					'faction' => array(
						'albion'	=> 'all',
						'hibernia'	=> 'all',
						'midgard'	=> 'all'
					),
				),
			),
			array(
				'name'		=> 'class',
				'type'		=> 'classes',
				'admin'		=> false,
				'decorate'	=> true,
				'primary'	=> true,
				'colorize'	=> true,
				'roster'	=> true,
				'recruitment' => true,
				'parent'	=> array(
					'race' => array(
						0 	=> 'all',			// Unknown
						1 	=> 'all',			// Avalonian
						2 	=> 'all',			// Briton
						3 	=> 'all',			// Half Ogre
						4 	=> 'all',			// Highlander
						5 	=> 'all',			// Inconnu
						6 	=> 'all',			// Saracen
						7 	=> 'all',			// Celt
						8 	=> 'all',			// Elf
						9 	=> 'all',			// Firbolg
						10 	=> 'all',			// Lurikeen
						11 	=> 'all',			// Shar
						12 	=> 'all',			// Sylvan
						13 	=> 'all',			// Dwarf
						14 	=> 'all',			// Frostalf
						15 	=> 'all',			// Kobold
						16 	=> 'all',			// Norse
						17	=> 'all',			// Troll
						18	=> 'all',			// Valkyn
						19 	=> 'all',			// Minitaur
					),
				),
			),
		);

		protected $glang		= array();
		protected $lang_file	= array();
		protected $path			= false;
		public $lang			= false;

		/**
		* Initialises filters
		*
		* @param array $langs
		*/
		protected function load_filters($langs){
			if(!$this->classes) {
				$this->load_type('classes', $langs);
			}
			foreach($langs as $lang) {
				$names = $this->classes[$this->lang];
				$this->filters[$lang][] = array('name' => '-----------', 'value' => false);
				foreach($names as $id => $name) {
					$this->filters[$lang][] = array('name' => $name, 'value' => 'class:'.$id);
				}
			}
		}

		public function get_OnChangeInfos($install=false){
		
			$info['aq'] = array();
			
			/*
			//Do this SQL Query NOT if the Eqdkp is installed -> only @ the first install
			if($install){
			}*/
			return $info;
		}
	}
}
?>