<?php
/**
 * Ms\Core\Exception\ClassNotFoundException
 * Класс для исключений, возникающих когда вызов метода недопустим для текущего состояния объекта.
 *
 * @package Ms\Core
 * @subpackage Exception
 * @author Mikhail Sergeev <msergeev06@gmail.com>
 * @copyright 2019 Mikhail Sergeev
 */

namespace Ms\Core\Exception;

/**
 * Class InvalidOperationException
 * @package Ms\Core
 * @subpackage Exception
 *
 * @link https://api.dobrozhil.ru/classes/ms_core_exception_invalid_operation_exception/
 */
class InvalidOperationException extends SystemException
{
	/**
	 * Конструктор. Создает объект исключения
	 *
	 * @param string            $message    Сообщение исключения
	 *                                      Необязательный, по-умолчанию пустая строка
	 * @param \Exception|null   $previous   Предыдущее исключение
	 *                                      Необязательный, по-умолчанию null
	 *
	 * @link https://api.dobrozhil.ru/methods/ms_core_exception_invalid_operation_exception_construct/
	 */
	public function __construct($message = "", \Exception $previous = null)
	{
		parent::__construct($message, 160, '', 0, $previous);
	}
}
