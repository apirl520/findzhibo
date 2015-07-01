<?php
/**
 * Created by PhpStorm.
 * User: limu
 * Date: 14-7-21
 * Time: 上午10:29
 */

class TbJumbotron extends CWidget{
	/**
	 * @var string the heading text.
	 */
	public $heading;
	/**
	 * @var boolean indicates whether to encode the heading.
	 */
	public $encodeHeading = true;
	/**
	 * @var array the HTML attributes for the heading element.
	 * @since 1.0.0
	 */
	public $headingOptions = array();
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		if (isset($this->htmlOptions['class']))
			$this->htmlOptions['class'] .= ' jumbotron';
		else
			$this->htmlOptions['class'] = 'jumbotron';

		if ($this->encodeHeading)
			$this->heading = CHtml::encode($this->heading);

		echo CHtml::openTag('div', $this->htmlOptions);

		if (isset($this->heading))
			echo CHtml::tag('h1', $this->headingOptions, $this->heading);
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		echo '</div>';
	}
}
