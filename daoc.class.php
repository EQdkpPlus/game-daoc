<?php
/*	Project:	EQdkp-Plus
 *	Package:	Dark age of Camelot game package
 *	Link:		http://eqdkp-plus.eu
 *
 *	Copyright (C) 2006-2015 EQdkp-Plus Developer Team
 *
 *	This program is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU Affero General Public License as published
 *	by the Free Software Foundation, either version 3 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU Affero General Public License for more details.
 *
 *	You should have received a copy of the GNU Affero General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found');exit;
}

if(!class_exists('daoc')) {
	class daoc extends game_generic {
		protected static $apiLevel	= 20;
		public $version				= '2.1.0';
		protected $this_game		= 'daoc';
		protected $types			= array('classes', 'races', 'factions', 'filters');
		protected $classes			= array();
		protected $races			= array();
		protected $factions			= array();
		protected $filters			= array();
		public $langs				= array('english');

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

		public function install($install=false){}
	}
}
?>