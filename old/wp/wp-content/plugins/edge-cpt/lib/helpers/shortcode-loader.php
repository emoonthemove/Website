<?php
namespace IllustratorEdge\Modules\Shortcodes\Lib;

use IllustratorEdge\Modules\ImageWithText\ImageWithText;
use IllustratorEdge\Modules\Shortcodes\Accordion\Accordion;
use IllustratorEdge\Modules\Shortcodes\AccordionTab\AccordionTab;
use IllustratorEdge\Modules\Shortcodes\Blockquote\Blockquote;
use IllustratorEdge\Modules\Shortcodes\BlogList\BlogList;
use IllustratorEdge\Modules\Shortcodes\BlogSlider\BlogSlider;
use IllustratorEdge\Modules\Shortcodes\Button\Button;
use IllustratorEdge\Modules\Shortcodes\CallToAction\CallToAction;
use IllustratorEdge\Modules\Shortcodes\Counter\Countdown;
use IllustratorEdge\Modules\Shortcodes\Counter\Counter;
use IllustratorEdge\Modules\Shortcodes\CustomFont\CustomFont;
use IllustratorEdge\Modules\Shortcodes\DeviceShowcase\DeviceShowcase;
use IllustratorEdge\Modules\Shortcodes\Dropcaps\Dropcaps;
use IllustratorEdge\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use IllustratorEdge\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use IllustratorEdge\Modules\Shortcodes\GoogleMap\GoogleMap;
use IllustratorEdge\Modules\Shortcodes\Highlight\Highlight;
use IllustratorEdge\Modules\Shortcodes\Icon\Icon;
use IllustratorEdge\Modules\Shortcodes\IconListItem\IconListItem;
use IllustratorEdge\Modules\Shortcodes\IconWithText\IconWithText;
use IllustratorEdge\Modules\Shortcodes\ImageGallery\ImageGallery;
use IllustratorEdge\Modules\ImageMerge\ImageMerge;
use IllustratorEdge\Modules\Shortcodes\Message\Message;
use IllustratorEdge\Modules\Shortcodes\OrderedList\OrderedList;
use IllustratorEdge\Modules\Shortcodes\PieCharts\PieChartBasic\PieChartBasic;
use IllustratorEdge\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartDoughnut;
use IllustratorEdge\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartPie;
use IllustratorEdge\Modules\Shortcodes\PieCharts\PieChartWithIcon\PieChartWithIcon;
use IllustratorEdge\Modules\Shortcodes\PricingTables\PricingTables;
use IllustratorEdge\Modules\Shortcodes\PricingTable\PricingTable;
use IllustratorEdge\Modules\Shortcodes\Process\ProcessHolder;
use IllustratorEdge\Modules\Shortcodes\Process\ProcessItem;
use IllustratorEdge\Modules\Shortcodes\ProgressBar\ProgressBar;
use IllustratorEdge\Modules\Shortcodes\Separator\Separator;
use IllustratorEdge\Modules\Shortcodes\SocialShare\SocialShare;
use IllustratorEdge\Modules\Shortcodes\Tabs\Tabs;
use IllustratorEdge\Modules\Shortcodes\Tab\Tab;
use IllustratorEdge\Modules\Shortcodes\Team\Team;
use IllustratorEdge\Modules\Shortcodes\UnorderedList\UnorderedList;
use IllustratorEdge\Modules\Shortcodes\VerticalSplitSlider\VerticalSplitSlider;
use IllustratorEdge\Modules\Shortcodes\VerticalSplitSliderContentItem\VerticalSplitSliderContentItem;
use IllustratorEdge\Modules\Shortcodes\VerticalSplitSliderLeftPanel\VerticalSplitSliderLeftPanel;
use IllustratorEdge\Modules\Shortcodes\VerticalSplitSliderRightPanel\VerticalSplitSliderRightPanel;
use IllustratorEdge\Modules\Shortcodes\VideoButton\VideoButton;
use IllustratorEdge\Modules\Shortcodes\Clients\Clients;
use IllustratorEdge\Modules\Shortcodes\Client\Client;
use IllustratorEdge\Modules\Shortcodes\CrossfadeImages\CrossfadeImages;
use IllustratorEdge\Modules\Shortcodes\ScrollSlider\ScrollSlider;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new Blockquote());
		$this->addShortcode(new BlogList());
		$this->addShortcode(new BlogSlider());
		$this->addShortcode(new Button());
		$this->addShortcode(new CallToAction());
		$this->addShortcode(new Counter());
		$this->addShortcode(new Countdown());
		$this->addShortcode(new CustomFont());
		$this->addShortcode(new DeviceShowcase());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new ElementsHolder());
		$this->addShortcode(new ElementsHolderItem());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new Icon());
		$this->addShortcode(new IconListItem());
		$this->addShortcode(new IconWithText());
		$this->addShortcode(new ImageGallery());
		$this->addShortcode(new ImageMerge());
		$this->addShortcode(new ImageWithText());
		$this->addShortcode(new Message());
		$this->addShortcode(new OrderedList());
		$this->addShortcode(new PieChartBasic());
		$this->addShortcode(new PieChartPie());
		$this->addShortcode(new PieChartDoughnut());
		$this->addShortcode(new PieChartWithIcon());
		$this->addShortcode(new PricingTables());
		$this->addShortcode(new PricingTable());
		$this->addShortcode(new ProgressBar());
		$this->addShortcode(new ProcessHolder());
		$this->addShortcode(new ProcessItem());
		$this->addShortcode(new Separator());
		$this->addShortcode(new SocialShare());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new Team());
		$this->addShortcode(new UnorderedList());
		$this->addShortcode(new VideoButton());
		$this->addShortcode(new VerticalSplitSlider());
		$this->addShortcode(new VerticalSplitSliderLeftPanel());
		$this->addShortcode(new VerticalSplitSliderRightPanel());
		$this->addShortcode(new VerticalSplitSliderContentItem());
		$this->addShortcode(new Clients());
		$this->addShortcode(new Client());
		$this->addShortcode(new CrossfadeImages());
		$this->addShortcode(new ScrollSlider());
	}
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}
	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();