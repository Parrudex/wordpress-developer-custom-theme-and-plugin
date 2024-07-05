<?php defined('ABSPATH') || exit;

if (!class_exists('BuildBox_Play')):

	final class BuildBox_Play
	{
		public $version = '1.0.0';

		protected static $instance = null;

		public static function instance()
		{
			if (is_null(self::$instance)) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		public function __construct()
		{
			$this->define_constants();
			$this->init_hooks();
			$this->includes();
		}

		private function define_constants()
		{
			define('BXPLAY_FILE',      __FILE__);
			define('BXPLAY_ABSPATH',   dirname(__FILE__) . '/');
			define('BXPLAY_BASENAME',  plugin_basename(__FILE__));
			define('BXPLAY_PATH',      plugin_dir_path(__FILE__));
			define('BXPLAY_URL',       plugin_dir_url(__FILE__));
			define('BXPLAY_VERSION',   $this->version);
		}

		private function init_hooks()
		{
			show_admin_bar(false);
			add_action('intermediate_image_sizes_advanced', array($this, 'remove_default_images'));
			add_action('after_setup_theme', array($this, 'core_setup'), 11);

			// Not using Emoji on your WordPress.
			remove_action('wp_head', 'print_emoji_detection_script', 7);
			remove_action('wp_print_styles', 'print_emoji_styles');

			if ((!is_admin() || defined('DOING_AJAX')) && !defined('DOING_CRON')) {
				add_action('wp_enqueue_scripts', array(__CLASS__, 'frontend_load_scripts'));
			}
		}

		public function includes()
		{
			include_once BXPLAY_ABSPATH . 'inc/post-type.php';
			include_once BXPLAY_ABSPATH . 'inc/functions.php';
		}

		public static function frontend_load_scripts()
		{
			wp_enqueue_style('style-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');
			wp_enqueue_style('style-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.1.4', 'all');
			wp_enqueue_style('style-main', get_stylesheet_uri(), array(), BXPLAY_VERSION, 'all');

			wp_deregister_script('jquery');
			wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', true);
			wp_enqueue_script('script-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
			wp_enqueue_script('script-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.1.4', true);
			wp_enqueue_script('script-main', get_theme_file_uri('/assets/js/main.js'), array('jquery'), BXPLAY_VERSION, true);
		}

		public function remove_default_images($sizes)
		{
			unset( $sizes['medium']);       // 300px
			unset( $sizes['medium_large']); // 768px
			unset( $sizes['large']);        // 1024px
			unset( $sizes['1536x1536'] );   // 2 x Medium Large (1536 x 1536)
			unset( $sizes['2048x2048'] );   // 2 x Large (2048 x 2048)
			return $sizes;
		}

		public function core_setup()
		{
			add_theme_support('post-thumbnails');
			add_theme_support('html5', array('search-form'));
			add_filter('big_image_size_threshold', '__return_false');

			add_image_size('play_large', 1920, 1000, true);
			add_image_size('play_thumb', 300, 470, true);
		}
	}

endif;

function f_bxplay() {
	return BuildBox_Play::instance();
}

$GLOBALS['bxplay'] = f_bxplay();