<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Kvp_Customizer {

	public function __construct() {
		add_action('customize_register', array($this, 'register_customize_sections'));
	}

	public function register_customize_sections($wp_customize) {
		$this->header_callout_section($wp_customize);
		$this->footer_callout_section($wp_customize);
	}

	/*
	 *	Header settings 
	 */
	public function header_callout_section($wp_customize) {
		/*
		 * header setting section
		 */ 
		$wp_customize->add_section('basic-header-callout-section', array(
			'title' => 'Налаштування хедера', 
			'priority' => 2,
			'description' => __('Налаштування контактної інформації в шапці сайту'),
		));
		/*
		 * mail link setting
		 */ 
		$wp_customize->add_setting('basic-header-callout-mail', array(
			'default' => 'test@mail.com',
			'sanitize_callback' => array($this, 'sanitize_custom_url'),
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-header-callout-section', array(
			'label' => 'Адреса пошти',
			'section' => 'basic-header-callout-section',
			'settings' => 'basic-header-callout-mail',
			'type' => 'url',
		)));
		/*
		 * facebook link setting
		 */ 
		$wp_customize->add_setting('basic-header-callout-instagram', array(
			'default' => 'https://www.instagram.com/',
			'sanitize_callback' => array($this, 'sanitize_custom_url'),
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-header-callout-instagram-control', array(
			'label' => 'Посилання на Ваш Instagram',
			'section' => 'basic-header-callout-section',
			'settings' => 'basic-header-callout-instagram',
			'type' => 'url',
		)));
		/*
		 * facebook link setting
		 */ 
		$wp_customize->add_setting('basic-header-callout-facebook', array(
			'default' => 'https://www.facebook.com/',
			'sanitize_callback' => array($this, 'sanitize_custom_url'),
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-header-callout-facebook-control', array(
			'label' => 'Посилання на Ваш Facebook',
			'section' => 'basic-header-callout-section',
			'settings' => 'basic-header-callout-facebook',
			'type' => 'url',
		)));
		/*
		 * youtube link setting
		 */ 
		$wp_customize->add_setting('basic-header-callout-youtube', array(
			'default' => 'https://www.youtube.com/',
			'sanitize_callback' => array($this, 'sanitize_custom_url'),
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-header-callout-youtube-control', array(
			'label' => 'Посилання на Ваш Youtube',
			'section' => 'basic-header-callout-section',
			'settings' => 'basic-header-callout-youtube',
			'type' => 'url',
		)));
		/*
		 * first number setting
		 */ 
		$wp_customize->add_setting('basic-header-callout-f-number', array(
			'default' => '+38 0542 62 8315',
			'sanitize_callback' => array($this, 'sanitize_custom_text'),
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-header-callout-f-number-control', array(
			'label' => 'Номер телефона №1',
			'section' => 'basic-header-callout-section',
			'settings' => 'basic-header-callout-f-number',
		)));
		/*
		 * seconds number setting
		 */ 
		$wp_customize->add_setting('basic-header-callout-s-number', array(
			'default' => '+38 068 581 96 87',
			'sanitize_callback' => array($this, 'sanitize_custom_text'),
		));
		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-header-callout-s-number-control', array(
			'label' => 'Номер телефона №2',
			'section' => 'basic-header-callout-section',
			'settings' => 'basic-header-callout-s-number',
		)));
		/*
		 * instagram icon
		 */ 
        $wp_customize->add_setting('header-icon-instagram-set', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', 
        ));
        $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'header-icon-instagram-set-control', array(
            'label' => 'Іконка Instagram',
            'section' => 'basic-header-callout-section',
            'settings' => 'header-icon-instagram-set',
        )));
		/*
		 * facebook icon
		 */ 
        $wp_customize->add_setting('header-icon-face-set', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', 
        ));

        $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'header-icon-face-set-control', array(
            'label' => 'Іконка Facebook',
            'section' => 'basic-header-callout-section',
            'settings' => 'header-icon-face-set',
        )));
		/*
		 * youtube icon
		 */ 
        $wp_customize->add_setting('header-icon-yu-set', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', 
        ));
        $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'header-icon-yu-set-control', array(
            'label' => 'Іконка Youtube',
            'section' => 'basic-header-callout-section',
            'settings' => 'header-icon-yu-set',
        )));
		/*
		 * mail icon
		 */ 
        $wp_customize->add_setting('header-icon-mail-set', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', 
        ));
        $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'header-icon-mail-set-control', array(
            'label' => 'Іконка Email',
            'section' => 'basic-header-callout-section',
            'settings' => 'header-icon-mail-set',
        )));
	}

	/*
	 *	Footer settings 
	 */
    public function footer_callout_section($wp_customize) {
        /*
         * Footer setting section
         */
        $wp_customize->add_section('footer-callout-section', array(
            'title' => 'Налаштування футера',
            'priority' => 3, 
            'description' => __('Налаштування футера сайту'),
        ));
		
		/*
		 * btn title setting
		 */ 
        $wp_customize->add_setting('footer-btn-title-text', array(
            'default' => 'Електронне звернення',
            'sanitize_callback' => 'sanitize_text_field', 
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer-btn-title-text-control', array(
            'label' => 'Електронне звернення (назва кнопки)', 
            'section' => 'footer-callout-section',
            'settings' => 'footer-btn-title-text',
        )));
		/*
		 * btn href setting
		 */ 
        $wp_customize->add_setting('footer-btn-href-text', array(
            'default' => 'info',
            'sanitize_callback' => 'sanitize_text_field', 
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer-btn-href-text-control', array(
            'label' => 'Електронне звернення (пошта)', 
            'section' => 'footer-callout-section',
            'settings' => 'footer-btn-href-text',
        )));
		/*
		 * btn href setting
		 */ 
        $wp_customize->add_setting('footer-shortcode-text', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field', 
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer-shortcode-text-control', array(
            'label' => 'Шорткод форми', 
            'section' => 'footer-callout-section',
            'settings' => 'footer-shortcode-text',
        )));


		/*
		 * instagram icon
		 */ 
        $wp_customize->add_setting('footer-icon-instagram-set', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', 
        ));
        $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'footer-icon-instagram-set-control', array(
            'label' => 'Іконка Instagram',
            'section' => 'footer-callout-section',
            'settings' => 'footer-icon-instagram-set',
        )));
		/*
		 * facebook icon
		 */ 
        $wp_customize->add_setting('footer-icon-face-set', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', 
        ));

        $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'footer-icon-face-set-control', array(
            'label' => 'Іконка Facebook',
            'section' => 'footer-callout-section',
            'settings' => 'footer-icon-face-set',
        )));
		/*
		 * youtube icon
		 */ 
        $wp_customize->add_setting('footer-icon-yu-set', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', 
        ));
        $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'footer-icon-yu-set-control', array(
            'label' => 'Іконка Youtube',
            'section' => 'footer-callout-section',
            'settings' => 'footer-icon-yu-set',
        )));
		/*
		 * mail icon
		 */ 
        $wp_customize->add_setting('footer-icon-mail-set', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', 
        ));
        $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'footer-icon-mail-set-control', array(
            'label' => 'Іконка Пошти',
            'section' => 'footer-callout-section',
            'settings' => 'footer-icon-mail-set',
        )));
		/*
		 * mail icon
		 */ 
        $wp_customize->add_setting('footer-callback-img-set', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw', 
        ));
        $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'footer-callback-img-set-control', array(
            'label' => 'Зображення до секції "Залишилися питання"',
            'section' => 'footer-callout-section',
            'settings' => 'footer-callback-img-set',
        )));

    }

	// Sanitize
	public function sanitize_custom_url($input) {
		return filter_var($input, FILTER_SANITIZE_URL);
	}

	public function sanitize_custom_email($input) {
		return filter_var($input, FILTER_SANITIZE_EMAIL);
	}

	public function sanitize_custom_text($input) {
		return filter_string_polyfill($input);
	}
	
}