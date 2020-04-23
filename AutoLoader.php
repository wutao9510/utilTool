<?php 

/**
 * class auto load
 * PSR-4规范
 */
class AutoLoader
{
	private function __construct(){}

	private function __clone(){}

	/**
	 * 命名空间与路径
	 * @var [type]
	 */
	protected static $vndorMap = [
		'Chenmu' => __DIR__ . DIRECTORY_SEPARATOR
	];

	/**
	 * 自动加载类
	 * @param  [string] $class 调用的类
	 * @return [void]
	 */
	public static function autoload(string $class)
	{
		$top = substr($class, 0, strpos($class, "\\"));
		$topDir = self::$mvcMap[$top];
		$path = substr($class, strlen($top)) . '.php';
		$file = strtr($topDir . $path, '\\', DIRECTORY_SEPARATOR);
		if (file_exists($file) && is_file($file)) {
			require_once $file;
		}
	}
}
spl_autoload_register('AutoLoader::autoload');