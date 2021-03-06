<?php
namespace TYPO3\Fluid\Reflection;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2009 Christopher Hlubek <hlubek@networkteam.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * Extended version of the ReflectionParameter
 *
 * @package TYPO3\Fluid
 * @subpackage Reflection
 * @version $Id$
 */
class ParameterReflection extends \ReflectionParameter {

	/**
	 * The constructor, initializes the reflection parameter
	 *
	 * @param string $function
	 * @param string $parameterName
	 */
	public function __construct($function, $parameterName) {
		parent::__construct($function, $parameterName);
	}

	/**
	 * Returns the declaring class
	 *
	 * @return \TYPO3\Fluid\Reflection\ClassReflection The declaring class
	 */
	public function getDeclaringClass() {
		return new \TYPO3\Fluid\Reflection\ClassReflection(parent::getDeclaringClass()->getName());
	}

	/**
	 * Returns the parameter class
	 *
	 * @return \TYPO3\Fluid\Reflection\ClassReflection The parameter class
	 */
	public function getClass() {
		try {
			$class = parent::getClass();
		} catch (\Exception $e) {
			return NULL;
		}
		return is_object($class) ? new \TYPO3\Fluid\Reflection\ClassReflection($class->getName()) : NULL;
	}

}


?>