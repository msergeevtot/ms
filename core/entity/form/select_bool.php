<?php
/**
 * Поле веб-формы select для булевого типа
 *
 * @package Ms\Core
 * @subpackage Entity\Form
 * @author Mikhail Sergeev <msergeev06@gmail.com>
 * @copyright 2019 Mikhail Sergeev
 */

namespace Ms\Core\Entity\Form;

use Ms\Core\Entity\Application;
use Ms\Core\Lib\IO\Files;
use Ms\Core\Lib\Loc;

/**
 * Class SelectBool
 *
 * @package Ms\Core
 * @subpackage Entity\Form
 */
class SelectBool extends Field
{
	public function __construct ($title=null,$help=null,$name=null,$default_value=null,$requiredValue=false,$functionCheck=null)
	{
		parent::__construct('SelectBool',$title,$help,$name,$default_value,$requiredValue,$functionCheck);
	}

	public function showField ($value=null)
	{
		$fieldTemplate = $this->getFormTemplatesPath('select');
		$template = Loc::getCoreMessage('no_template_exists');
		if ($fieldTemplate)
		{
			$template = Files::loadFile($fieldTemplate);
		}
		if (is_null($value))
		{
			$value = $this->default_value;
		}
		/*
		 * Поля шаблона:
		 * #FIELD_NAME# - имя поля
		 * #FIELD_TITLE# - имя поля (также можно добавить флаг обязательности заполнения)
		 * #SELECT_BOX# - <select> (само поле)
		 * #FIELD_REQUIRED# - флаг обязательного поля, если обязательное нужно поставить 1, иначе 0
		 * #ERROR_TEXT_FIELD_REQUIRED# - текст ошибки "Поле обязательно для заполнения"
		 * #NAMESPACE# - класс обработчик
		 * #FUNCTION# - функция обработчик
		 * #PATH# - путь к обработчику
		 */
		$app = Application::getInstance();
		list ($namespace, $func) = $this->check();
		$path = $app->getSitePath($app->getSettings()->getCoreRoot().'/tools/check_form_field.php');
		$title = $this->title;
		if ($this->requiredValue)
		{
			$title .= '<span class="field_required" style="color:red;font-size: 20px;">*</span>';
			$template = str_replace('#FIELD_REQUIRED#',1,$template);
		}
		else
		{
			$template = str_replace('#FIELD_REQUIRED#',0,$template);
		}

		$template = str_replace('#ERROR_TEXT_FIELD_REQUIRED#',Loc::getCoreMessage('field_required'),$template);
		$template = str_replace('#FIELD_NAME#',$this->name,$template);
		$template = str_replace('#FIELD_TITLE#',$title,$template);
		$template = str_replace('#SELECT_BOX#',\SelectBoxBool($this->name,$value,'Да','Нет','class="'.strtolower($this->name).' form-control"'),$template);
		if (is_null($this->help))
		{
			$help = '';
		}
		else
		{
			$help = $this->help;
		}
		$template = str_replace('#FIELD_HELP#',$help,$template);
		$template = str_replace('#NAMESPACE#',str_replace('\\','\\\\',$namespace),$template);
		$template = str_replace('#FUNCTION#',$func,$template);
		$template = str_replace('#PATH#',$path,$template);

		return $template;
	}
}