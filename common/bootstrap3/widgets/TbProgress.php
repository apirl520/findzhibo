<?php
/**
 * TbProgress class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 0.9.10
 */

/**
 * Bootstrap progress bar widget.
 * @see http://twitter.github.com/bootstrap/components.html#progress
 */
class TbProgress extends CWidget {
	// Progress bar types.
	const TYPE_INFO = 'info';
	const TYPE_SUCCESS = 'success';
	const TYPE_WARNING = 'warning';
	const TYPE_DANGER = 'danger';

	/**
	 * @var string the bar type. Valid values are 'info', 'success', and 'danger'.
	 */
	public $type;
	/**
	 * @var boolean indicates whether the bar is striped.
	 */
	public $striped = false;
	/**
	 * @var boolean indicates whether the bar is animated.
	 */
	public $animated = false;
	/**
	 * @var integer the amount of progress in percent.
	 */
	public $percent = 0;
	public $max = 100;
	public $min = 0;

	public $items = array();
	/**
	 * @var display progress number
	 */
	public $sr_only = false;
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();

	public $options = array();

	/**
	 * Initializes the widget.
	 */
	public function init() {
		$sr_only = '';
		$classes = array('progress');
		$opt_class = array('progress-bar');
		$validTypes = array(self::TYPE_INFO, self::TYPE_SUCCESS, self::TYPE_WARNING, self::TYPE_DANGER);

		if (isset($this->type) && in_array($this->type, $validTypes))
			$opt_class[] = 'progress-bar-' . $this->type;


		if ($this->striped)
			$classes[] = 'progress-striped';

		if ($this->animated)
			$classes[] = 'active';
		if ($this->sr_only)
			$this->sr_only = 'class="sr-only"';

		if (!empty($classes)) {
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class']))
				$this->htmlOptions['class'] .= ' ' . $classes;
			else
				$this->htmlOptions['class'] = $classes;
		}

		if (!empty($opt_class)) {
			$opt_class = implode(' ', $opt_class);
			if (isset($this->options['class']))
				$this->options['class'] .= ' ' . $opt_class;
			else
				$this->options['class'] = $opt_class;
		}
		$this->options['role'] = 'progressbar';
		$this->options['style'] = 'width:' . $this->percent . '%;';
		$this->options['aria-valuenow'] = $this->percent;
		$this->options['aria-valuemin'] = $this->min;
		$this->options['aria-valuemax'] = $this->max;


		if ($this->percent < $this->min)
			$this->percent = $this->min;
		else if ($this->percent > $this->max)
			$this->percent = $this->max;
	}

	/**
	 * Runs the widget.
	 */
	public function run() {
		if (isset($this->items) && $this->items) {
			$this->options = array();
			echo CHtml::openTag('div', $this->htmlOptions);
			$validTypes = array(self::TYPE_INFO, self::TYPE_SUCCESS, self::TYPE_WARNING, self::TYPE_DANGER);
			foreach ($this->items as $item) {
				$this->options = array();
				if (isset($item)) {
					if (isset($item['type']) && in_array($item['type'], $validTypes))
						$this->options['class'] = 'progress-bar progress-bar-' . $item['type'];
					$this->options['style'] = 'width:' . $item['percent'] . '%;';
				}
				$this->percent = isset($item['percent']) ? $item['percent'] : '';
				$this->sr_only = isset($item['sr_only']) ? $item['sr_only'] : '';
				echo CHtml::openTag('div', $this->options);
				echo '<span ' . $this->sr_only . '>' . $this->percent . '%</span>';
				echo '</div>';
			}
			echo '</div>';
		} else {
			echo CHtml::openTag('div', $this->htmlOptions);
			echo CHtml::openTag('div', $this->options);
			echo '<span ' . $this->sr_only . '>' . $this->percent . '%</span>';
			echo '</div>';
			echo '</div>';
		}
	}
}
