<?php
/**
 * Поле веб-формы input type="email"
 *
 * @package Ms\Core
 * @subpackage Entity\Form
 * @author Mikhail Sergeev <msergeev06@gmail.com>
 * @copyright 2018 Mikhail Sergeev
 * @since 0.2.0
 */

namespace Ms\Core\Entity\Form;

/**
 * Class InputEmail
 *
 * @package Ms\Core
 * @subpackage Entity\Form
 */
class InputEmail extends Field
{
	public function __construct ($title=null,$name=null,$default_value=null,$requiredValue=false,$functionCheck=null)
	{
		parent::__construct('InputEmail',$title,$name,$default_value,$requiredValue,$functionCheck);
	}

	public function showField($value=null)
	{

	}
}