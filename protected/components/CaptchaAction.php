<?php
class CaptchaAction extends CCaptchaAction
{
	/**
	 * @var integer how many times should the same CAPTCHA be displayed. Defaults to 3.
	 */
	public $testLimit=1;
	/**
	 * @var integer the default length for randomly generated word. Defaults to 6.
	 */
	public $defaultLength=6;

	/**
	 * Generates a new verification code.
	 * @return string the generated verification code
	 */
	protected function generateVerifyCode()
	{
		$length=$this->defaultLength;
		$letters='0123456789';
		$code='';
		for($i=0;$i<$length;++$i)
		{
			$code.=$letters[rand(0,9)];
		}
		return $code;
	}
}
