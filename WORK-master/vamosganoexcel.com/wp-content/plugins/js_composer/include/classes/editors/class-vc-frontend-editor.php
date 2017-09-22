<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * WPBakery Visual Composer front end editor
 *
 * @package WPBakeryVisualComposer
 *
 */

/**
 * Vc front end editor.
 *
 * Introduce principles ‘What You See Is What You Get’ into your page building process with our amazing frontend editor.
 * See how your content will look on the frontend instantly with no additional clicks or switches.
 *
 * @since   4.0
 */
class Vc_Frontend_Editor implements Vc_Editor_Interface {
	/**
	 * @var
	 */
	protected $dir;
	/**
	 * @var int
	 */
	protected $tag_index = 1;
	/**
	 * @var array
	 */
	public $post_shortcodes = array();
	/**
	 * @var string
	 */
	protected $template_content = '';
	/**
	 * @var bool
	 */
	protected static $enabled_inline = true;

	/**
	 * @var
	 */
	public $current_user;
	/**
	 * @var
	 */
	public $post;
	/**
	 * @var
	 */
	public $post_id;
	/**
	 * @var
	 */
	public $post_url;
	/**
	 * @var
	 */
	public $url;
	/**
	 * @var
	 */
	public $post_type;
	/**
	 * @var array
	 */#vc_ui-panel-edit-element
	protected $settings = array(
		'assets_dir' => 'assets',
		'templates_dir' => 'templates',
		'template_extension' => 'tpl.php',
		'plugin_path' => 'js_composer/inline',
	);
	/**
	 * @var string
	 */
	protected static $content_editor_id = 'content';
	/**
	 * @var array
	 */
	protected static $content_editor_settings = array(
		'dfw' => true,
		'tabfocus_elements' => 'insert-media-button',
		'editor_height' => 360,
	);
	/**
	 * @var string
	 */
	protected static $brand_url = 'http://vc.wpbakery.com/?utm_campaign=VCplugin&utm_source=vc_user&utm_medium=frontend_editor';

	/**
	 *
	 */
	public function init() {
		$this->addHooks();
		/**
		 * If current mode of VC is frontend editor load it.
		 */
		if ( vc_is_frontend_editor() ) {
			$this->hookLoadEdit();
		} elseif ( vc_is_page_editable() ) {
			/**
			 * if page loaded inside frontend editor iframe it has page_editable mode.
			 * It required to some some js/css elements and add few helpers for editor to be used.
			 */
			$this->buildEditablePage();
		} else {
			// Is it is simple page just enable buttons and controls
			$this->buildPage();
		}

	}

	/**
	 *
	 */
	public function addHooks() {
		add_action( 'template_redirect', array(
			&$this,
			'loadShortcodes',
		) );
		add_filter( 'page_row_actions', array(
			&$this,
			'renderRowAction',
		) );
		add_filter( 'post_row_actions', array(
			&$this,
			'renderRowAction',
		) );
		add_shortcode( 'vc_container_anchor', 'vc_container_anchor' );

	}

	/**
	 *
	 */
	public function hookLoadEdit() {
		add_action( 'current_screen', array(
			&$this,
			'adminInit',
		) );
		do_action( 'vc_frontend_editor_hook_load_edit' );
	}

	/**
	 *
	 */
	public function adminInit() {
		$this->setPost();
		$this->renderEditor();
	}

	/**
	 *
	 */
	public function buildEditablePage() {
		! defined( 'CONCATENATE_SCRIPTS' ) && define( 'CONCATENATE_SCRIPTS', false );
		visual_composer()->shared_templates->init();
		add_filter( 'the_title', array(
			&$this,
			'setEmptyTitlePlaceholder',
		) );

		add_action( 'the_post', array(
			&$this,
			'parseEditableContent',
		), 9999 ); // after all the_post actions ended

		do_action( 'vc_inline_editor_page_view' );
		add_filter( 'wp_enqueue_scripts', array(
			&$this,
			'loadIFrameJsCss',
		) );

		add_action( 'wp_footer', array(
			&$this,
			'printPostShortcodes',
		) );
	}

	/**
	 *
	 */
	public function buildPage() {
		add_action( 'admin_bar_menu', array(
			&$this,
			'adminBarEditLink',
		), 1000 );
		add_filter( 'edit_post_link', array(
			&$this,
			'renderEditButton',
		) );
	}

	/**
	 * @return bool
	 */
	public static function inlineEnabled() {
		return true === self::$enabled_inline;
	}

	public static function frontendEditorEnabled() {
		return self::inlineEnabled() && vc_user_access()->part( 'frontend_editor' )->can()->get();
	}

	/**
	 * @param bool $disable
	 */
	public static function disableInline( $disable = true ) {
		self::$enabled_inline = ! $disable;
	}

	/**
	 * Main purpose of this function is to
	 *  1) Parse post content to get ALL shortcodes in to array
	 *  2) Wrap all shortcodes into editable-wrapper
	 *  3) Return "iframe" editable content in extra-script wrapper
	 *
	 * @param Wp_Post $post
	 */
	public function parseEditableContent( $post ) {
		if ( ! vc_is_page_editable() || vc_action() || vc_post_param( 'action' ) ) {
			return;
		}

		$post_id = (int) vc_get_param( 'vc_post_id' );
		if ( $post_id > 0 && $post->ID === $post_id && ! defined( 'VC_LOADING_EDITABLE_CONTENT' ) ) {
			define( 'VC_LOADING_EDITABLE_CONTENT', true );
			remove_filter( 'the_content', 'wpautop' );
			do_action( 'vc_load_shortcode' );
			ob_start();
			$this->getPageShortcodesByContent( $post->post_content );
			vc_include_template( 'editors/partials/vc_welcome_block.tpl.php' );
			$post_content = ob_get_clean();

			ob_start();
			vc_include_template( 'editors/partials/post_shortcodes.tpl.php', array( 'editor' => $this ) );
			$post_shortcodes = ob_get_clean();
			$GLOBALS['vc_post_content'] = '<script type="template/html" id="vc_template-post-content" style="display:none">' . rawurlencode( apply_filters( 'the_content', $post_content ) ) . '</script>' . $post_shortcodes;
			// We already used the_content filter, we need to remove it to avoid double-using
			remove_all_filters( 'the_content' );
			// Used for just returning $post->post_content
			add_filter( 'the_content', array(
				&$this,
				'editableContent',
			) );
		}
	}

	/**
	 * @since 4.4
	 * Used to print rendered post content, wrapped with frontend editors "div" and etc.
	 */
	public function printPostShortcodes() {
		echo isset( $GLOBALS['vc_post_content'] ) ? $GLOBALS['vc_post_content'] : '';
	}

	/**
	 * @param $content
	 *
	 * @return string
	 */
	public function editableContent( $content ) {
		// same addContentAnchor
		do_shortcode( $content ); // this will not be outputted, but this is needed to enqueue needed js/styles.

		return '<span id="vc_inline-anchor" style="display:none !important;"></span>';
	}

	/**
	 * @param string $url
	 * @param string $id
	 *
	 * vc_filter: vc_get_inline_url - filter to edit frontend editor url (can be used for example in vendors like
	 *     qtranslate do)
	 *
	 * @return mixed|void
	 */
	public static function getInlineUrl( $url = '', $id = '' ) {
		$the_ID = ( strlen( $id ) > 0 ? $id : get_the_ID() );

		return apply_filters( 'vc_get_inline_url', admin_url() . 'post.php?vc_action=vc_inline&post_id=' . $the_ID . '&post_type=' . get_post_type( $the_ID ) . ( strlen( $url ) > 0 ? '&url=' . rawurlencode( $url ) : '' ) );
	}

	/**
	 * @return string
	 */
	function wrapperStart() {
		return '';
	}

	/**
	 * @return string
	 */
	function wrapperEnd() {
		return '';
	}

	/**
	 * @param $url
	 */
	public static function setBrandUrl( $url ) {
		self::$brand_url = $url;
	}

	/**
	 * @return string
	 */
	public static function getBrandUrl() {
		return self::$brand_url;
	}

	/**
	 * @return string
	 */
	public static function shortcodesRegexp() {
		$tagnames = array_keys( WPBMap::getShortCodes() );
		$tagregexp = implode( '|', array_map( 'preg_quote', $tagnames ) );
		// WARNING from shortcodes.php! Do not change this regex without changing do_shortcode_tag() and strip_shortcode_tag()
		// Also, see shortcode_unautop() and shortcode.js.
		return '\\[' // Opening bracket
		. '(\\[?)' // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
		. "($tagregexp)" // 2: Shortcode name
		. '(?![\\w-])' // Not followed by word character or hyphen
		. '(' // 3: Unroll the loop: Inside the opening shortcode tag
		. '[^\\]\\/]*' // Not a closing bracket or forward slash
		. '(?:' . '\\/(?!\\])' // A forward slash not followed by a closing bracket
		. '[^\\]\\/]*' // Not a closing bracket or forward slash
		. ')*?' . ')' . '(?:' . '(\\/)' // 4: Self closing tag ...
		. '\\]' // ... and closing bracket
		. '|' . '\\]' // Closing bracket
		. '(?:' . '(' // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
		. '[^\\[]*+' // Not an opening bracket
		. '(?:' . '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
		. '[^\\[]*+' // Not an opening bracket
		. ')*+' . ')' . '\\[\\/\\2\\]' // Closing shortcode tag
		. ')?' . ')' . '(\\]?)'; // 6: Optional second closing brocket for escaping shortcodes: [[tag]]

	}

	/**
	 *
	 */
	function setPost() {
		global $post;
		$this->post = get_post(); // fixes #1342 if no get/post params set
		$this->post_id = vc_get_param( 'post_id' );
		if ( vc_post_param( 'post_id' ) ) {
			$this->post_id = vc_post_param( 'post_id' );
		}
		if ( $this->post_id ) {
			$this->post = get_post( $this->post_id );
		}
		do_action_ref_array( 'the_post', array( &$this->post ) );
		$post = $this->post;
		$this->post_id = $this->post->ID;
	}

	/**
	 * @return mixed
	 */
	function post() {
		! isset( $this->post ) && $this->setPost();

		return $this->post;
	}

	/**
	 * Used for wp filter 'wp_insert_post_empty_content' to allow empty post insertion.
	 *
	 * @param $allow_empty
	 *
	 * @return bool
	 */
	public function allowInsertEmptyPost( $allow_empty ) {
		return false;
	}

	/**
	 * vc_filter: vc_frontend_editor_iframe_url - hook to edit iframe url, can be used in vendors like qtranslate do.
	 */
	function renderEditor() {
		global $current_user;
		wp_get_current_user();
		$this->current_user = $current_user;
		$this->post_url = vc_str_remove_protocol( get_permalink( $this->post_id ) );

		if ( ! self::inlineEnabled() || ! vc_user_access()->wpAny( array(
				'edit_post',
				$this->post_id,
			) )->get()
		) {
			header( 'Location: ' . $this->post_url );
		}
		$this->registerJs();
		$this->registerCss();
		visual_composer()->registerAdminCss(); //bc
		visual_composer()->registerAdminJavascript(); //bc
		if ( $this->post && 'auto-draft' === $this->post->post_status ) {
			$post_data = array(
				'ID' => $this->post_id,
				'post_status' => 'draft',
				'post_title' => '',
			);
			add_filter( 'wp_insert_post_empty_content', array(
				$this,
				'allowInsertEmptyPost',
			) );
			wp_update_post( $post_data, true );
			$this->post->post_status = 'draft';
			$this->post->post_title = '';

		}
		add_filter( 'admin_body_class', array(
			$this,
			'filterAdminBodyClass',
		) );

		$this->post_type = get_post_type_object( $this->post->post_type );
		$this->url = $this->post_url . ( preg_match( '/\?/', $this->post_url ) ? '&' : '?' ) . 'vc_editable=true&vc_post_id=' . $this->post->ID . '&_vcnonce=' . vc_generate_nonce( 'vc-admin-nonce' );
		$this->url = apply_filters( 'vc_frontend_editor_iframe_url', $this->url );
		$this->enqueueAdmin();
		$this->enqueueMappedShortcode();
		wp_enqueue_media( array( 'post' => $this->post_id ) );
		remove_all_actions( 'admin_notices', 3 );
		remove_all_actions( 'network_admin_notices', 3 );

		$post_custom_css = strip_tags( get_post_meta( $this->post_id, '_wpb_post_custom_css', true ) );
		$this->post_custom_css = $post_custom_css;

		if ( ! defined( 'IFRAME_REQUEST' ) ) {
			define( 'IFRAME_REQUEST', true );
		}
		/**
		 * @deprecated vc_admin_inline_editor action hook
		 */
		do_action( 'vc_admin_inline_editor' );
		/**
		 * new one
		 */
		do_action( 'vc_frontend_editor_render' );

		add_filter( 'admin_title', array(
			&$this,
			'setEditorTitle',
		) );
		$this->render( 'editor' );
		die();
	}

	/**
	 * @return string
	 */
	function setEditorTitle() {
		return sprintf( __( 'Edit %s with Visual Composer', 'js_composer' ), $this->post_type->labels->singular_name );
	}

	/**
	 * @param $title
	 *
	 * @return string|void
	 */
	function setEmptyTitlePlaceholder( $title ) {
		return ! is_string( $title ) || strlen( $title ) === 0 ? __( '(no title)', 'js_composer' ) : $title;
	}

	/**
	 * @param $template
	 */
	function render( $template ) {
		vc_include_template( 'editors/frontend_' . $template . '.tpl.php', array( 'editor' => $this ) );
	}

	/**
	 * @param $link
	 *
	 * @return string
	 */
	function renderEditButton( $link ) {
		if ( $this->showButton( get_the_ID() ) ) {
			return $link . ' <a href="' . self::getInlineUrl() . '" id="vc_load-inline-editor" class="vc_inline-link">' . __( 'Edit with Visual Composer', 'js_composer' ) . '</a>';
		}

		return $link;
	}

	/**
	 * @param $actions
	 *
	 * @return mixed
	 */
	function renderRowAction( $actions ) {
		$post = get_post();
		if ( $this->showButton( $post->ID ) ) {
			$actions['edit_vc'] = '<a
		href="' . $this->getInlineUrl( '', $post->ID ) . '">' . __( 'Edit with Visual Composer', 'js_composer' ) . '</a>';
		}

		return $actions;
	}

	/**
	 * @param null $post_id
	 *
	 * @return bool
	 */
	function showButton( $post_id = null ) {
		$type = get_post_type();

		return self::inlineEnabled() && ! in_array( get_post_status(), array(
			'private',
			'trash',
		) ) && ! in_array( $type, array(
			'templatera',
			'vc_grid_item',
		) ) && vc_user_access()->wpAny( array(
			'edit_post',
			$post_id,
		) )->get() && vc_check_post_type( $type );
	}

	/**
	 * @param WP_Admin_Bar $wp_admin_bar
	 */
	function adminBarEditLink( $wp_admin_bar ) {
		if ( ! is_object( $wp_admin_bar ) ) {
			global $wp_admin_bar;
		}
		if ( is_singular() ) {
			if ( $this->showButton( get_the_ID() ) ) {
				$wp_admin_bar->add_menu( array(
					'id' => 'vc_inline-admin-bar-link',
					'title' => __( 'Edit with Visual Composer', 'js_composer' ),
					'href' => self::getInlineUrl(),
					'meta' => array( 'class' => 'vc_inline-link' ),
				) );
			}
		}
	}

	/**
	 * @param $content
	 */
	function setTemplateContent( $content ) {
		$this->template_content = $content;
	}

	/**
	 * vc_filter: vc_inline_template_content - filter to override template content
	 * @return mixed|void
	 */
	function getTemplateContent() {
		return apply_filters( 'vc_inline_template_content', $this->template_content );
	}

	/**
	 *
	 */
	function renderTemplates() {
		$this->render( 'templates' );
		die();
	}

	/**
	 *
	 */
	function loadTinyMceSettings() {
		if ( ! class_exists( '_WP_Editors' ) ) {
			require( ABSPATH . WPINC . '/class-wp-editor.php' );
		}
		$set = _WP_Editors::parse_settings( self::$content_editor_id, self::$content_editor_settings );
		_WP_Editors::editor_settings( self::$content_editor_id, $set );
	}

	/**
	 *
	 */
	function loadIFrameJsCss() {
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-droppable' );
		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-autocomplete' );
		wp_enqueue_script( 'wpb_composer_front_js' );
		wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_style( 'vc_inline_css', vc_asset_url( 'css/js_composer_frontend_editor_iframe.min.css' ), array(), WPB_VC_VERSION );
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'wpb_scrollTo_js', vc_asset_url( 'lib/bower/scrollTo/jquery.scrollTo.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_enqueue_style( 'js_composer_custom_css' );

		wp_enqueue_script( 'wpb_php_js', vc_asset_url( 'lib/php.default/php.default.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_enqueue_script( 'vc_inline_iframe_js', vc_asset_url( 'js/dist/page_editable.min.js' ), array(
			'jquery',
			'underscore',
		), WPB_VC_VERSION, true );
		do_action( 'vc_load_iframe_jscss' );
	}

	/**
	 *
	 */
	function loadShortcodes() {
		if ( vc_is_page_editable() && vc_enabled_frontend() ) {
			$action = vc_post_param( 'action' );
			if ( 'vc_load_shortcode' === $action ) {
				! defined( 'CONCATENATE_SCRIPTS' ) && define( 'CONCATENATE_SCRIPTS', false );
				ob_start();
				$this->setPost();
				$shortcodes = (array) vc_post_param( 'shortcodes' );
				do_action( 'vc_load_shortcode', $shortcodes );
				$this->renderShortcodes( $sh