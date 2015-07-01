<?php
/**
 * TbNavbar class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 0.9.7
 */

Yii::import('bootstrap3.widgets.TbCollapse');

/**
 * Bootstrap navigation bar widget.
 */
class TbNavbar extends CWidget {
	// Navbar types.
	const TYPE_INVERSE = 'inverse';

	// Navbar fix locations.
	const FIXED_TOP = 'top';
	const FIXED_BOTTOM = 'bottom';

	/**
	 * @var string the navbar type. Valid values are 'inverse'.
	 * @since 1.0.0
	 */
	public $type;
	/**
	 * @var string the text for the brand.
	 */
	public $brand;
	/**
	 * @var string the URL for the brand link.
	 */
	public $brandUrl;
	/**
	 * @var array the HTML attributes for the brand link.
	 */
	public $brandOptions = array();
	/**
	 * @var mixed fix location of the navbar if applicable.
	 * Valid values are 'top' and 'bottom'. Defaults to 'top'.
	 * Setting the value to false will make the navbar static.
	 * @since 0.9.8
	 */
	public $fixed = self::FIXED_TOP;
	/**
	 * @var boolean whether the nav span over the full width. Defaults to false.
	 * @since 0.9.8
	 */
	public $fluid = false;
	/**
	 * @var boolean whether to enable collapsing on narrow screens. Default to false.
	 */
	public $collapse = false;
	/**
	 * @var array navigation items.
	 * @since 0.9.8
	 */
	public $items = array();
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();

	/**
	 * Initializes the widget.
	 */
	public function init() {
		if ($this->brand !== false) {
			if (!isset($this->brand))
				$this->brand = CHtml::encode(Yii::app()->name);

			if (!isset($this->brandUrl))
				$this->brandUrl = Yii::app()->homeUrl;

			if (isset($this->brandOptions['class']))
				$this->brandOptions['class'] .= ' navbar-brand';
			else
				$this->brandOptions['class'] = 'navbar-brand';

			$this->brandOptions['href'] = CHtml::normalizeUrl($this->brandUrl);
		}

		$classes = array('navbar navbar-default');

		if (isset($this->type) && in_array($this->type, array(self::TYPE_INVERSE)))
			$classes[] = 'navbar-' . $this->type;

		if ($this->fixed !== false && in_array($this->fixed, array(self::FIXED_TOP, self::FIXED_BOTTOM)))
			$classes[] = 'navbar-fixed-' . $this->fixed;

		if (!empty($classes)) {
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class']))
				$this->htmlOptions['class'] .= ' ' . $classes;
			else
				$this->htmlOptions['class'] = $classes;
			$this->htmlOptions['role'] = 'navigation';
		}
	}

	/**
	 * Runs the widget.
	 */
	public function run() {
		echo CHtml::openTag('nav', $this->htmlOptions);

		if ($this->fluid) {
			echo CHtml::openTag('div', array('class' => 'container-fluid'));
		} else {
			echo CHtml::openTag('div', array('class' => 'container'));
		}
		echo CHtml::openTag('div', array('class' => 'navbar-header'));

		$collapseId = TbCollapse::getNextContainerId();

		if ($this->collapse !== false) {
			echo CHtml::openTag('button', array(
				'type' => 'button',
				'class' => 'navbar-toggle collapsed',
				'data-toggle' => 'collapse',
				'data-target' => '#' . $collapseId
			));
			echo CHtml::openTag('span', array('class' => 'sr-only'));
			echo 'Toggle navigation';
			echo CHtml::closeTag('span');
			echo CHtml::openTag('span', array('class' => 'icon-bar'));
			echo CHtml::closeTag('span');
			echo CHtml::openTag('span', array('class' => 'icon-bar'));
			echo CHtml::closeTag('span');
			echo CHtml::closeTag('button');
		}

		if ($this->brand !== false) {
			if ($this->brandUrl !== false) {
				echo CHtml::openTag('a', $this->brandOptions) . $this->brand . '</a>';
			} else {
				unset($this->brandOptions['href']); // spans cannot have a href attribute
				echo CHtml::openTag('span', $this->brandOptions) . $this->brand . '</span>';
			}
		}
		echo CHtml::closeTag('div');

		foreach ($this->items as $item) {
			if (is_string($item))
				echo $item;
			else {
				if (isset($item['class'])) {
					$className = $item['class'];
					unset($item['class']);

					$this->controller->widget($className, $item);
				}
			}
		}

		echo CHtml::closeTag('div');
		echo CHtml::closeTag('nav');
	}

	/**
	 * Returns the navbar container CSS class.
	 * @return string the class
	 */
}
