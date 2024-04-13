<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Youtube_TV extends Widget_Base {

	public function get_name() {
		return 'cj-youtube_tv';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'YouTube TV', 'keystone-elements-addons' );
	}
    
    public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-youtube_tv','dashicons' ];
    }

    public function get_script_depends(){
		return [ 'cj-youtube_tv' ];
    }
    
    public function get_icon() {
		return 'eicon-youtube';
    }

	protected function register_controls() {
		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'YouTube TV', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'apikey',
			[
				'label' => esc_html__( 'API Key', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'description' => '<a href="http://help.wp4life.com/2017/07/21/get-tube-api-key/" target="_blank">' . esc_html__('How to get a YouTube API key?', 'keystone-elements-addons') . '</a>'
			]
		);
        
        $this->add_control(
			'username',
			[
				'label' => esc_html__( 'YouTube Username', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
			]
        );
        
        $this->add_control(
			'channelid',
			[
				'label' => esc_html__( 'Channel ID', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'UCyVIoK8dSHkZzHYXFDiZ45g'
			]
		);
        
        $this->add_control(
			'maxvideo',
			[
				'label' => esc_html__( 'Maximum number of videos', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 999,
				'step' => 1,
				'default' => 10,
			]
        );
        
        $this->add_control(
			'playlist',
			[
				'label' => esc_html__( 'Playlist', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Off', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
			]
        );
        
        $this->add_control(
			'maxplaylist',
			[
				'label' => esc_html__( 'Maximum number of playlists', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 999,
				'step' => 1,
                'default' => 20,
                'condition' => ['playlist' => 'yes'],
			]
        );
        
        $this->end_controls_section();

        // section start
		$this->start_controls_section(
			'section_container_style',
			[
				'label' => esc_html__( 'Container', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'layout',
			[
				'label' => esc_html__( 'Layout', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h-layout',
				'options' => [
					'h-layout'  => esc_html__( 'Horizontal', 'keystone-elements-addons' ),
					'v-layout' => esc_html__( 'Vertical', 'keystone-elements-addons' )
				],
			]
		);

        $this->add_responsive_control(
			'height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
                'step' => 1,
                'default' => 600,
                'selectors' => [
                    '{{WRAPPER}} .ytv-canvas' => 'height: {{VALUE}}px;',
				],
			]
        );

        $this->add_control(
			'container_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ytv-canvas' => 'background-color: {{VALUE}};'
				],
			]
        );

        $this->add_responsive_control(
			'playlist_height',
			[
				'label' => esc_html__( 'Playlist Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
                'step' => 1,
                'description' => esc_html__( 'Vertical & Mobile Layout', 'keystone-elements-addons' ),
                'selectors' => [
                    '{{WRAPPER}} .ytv-video' => 'padding-bottom: {{VALUE}}px;',
                    '{{WRAPPER}} .ytv-list' => 'height: {{VALUE}}px;',
				],
			]
        );

        $this->add_control(
			'playlist_color',
			[
				'label' => esc_html__( 'Playlist Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ytv-playlists' => 'background-color: {{VALUE}};'
				],
			]
        );

        $this->end_controls_section();

        // section start
		$this->start_controls_section(
			'section_menu_title_style',
			[
				'label' => esc_html__( 'Menu Title', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ytv-list-header > a > span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .ytv-list-header:after' => 'color: {{VALUE}};'
				],
			]
        );

        $this->add_control(
			'title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ytv-list-header' => 'background-color: {{VALUE}};'
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .ytv-list-header > a > span',
			]
        );
        
        $this->end_controls_section();

        // section start
		$this->start_controls_section(
			'section_menu_items_style',
			[
				'label' => esc_html__( 'Menu Items', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'menu_item_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ytv-list a' => 'color: {{VALUE}};'
				],
			]
        );

        $this->add_control(
			'menu_item_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ytv-list a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .ytv-list .ytv-active a' => 'color: {{VALUE}};'
				],
			]
        );

        $this->add_control(
			'menu_item_border_color',
			[
				'label' => esc_html__( 'Border Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .ytv-list a' => 'border-bottom-color: {{VALUE}};'
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'menu_item_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .ytv-list a',
			]
        );
        
        $this->end_controls_section();

	}
    
    protected function render() {
        $settings = $this->get_settings_for_display();
        $widget_id = $this->get_id();
        ?>
        <?php if ($settings['apikey']) { ?>
        <div class="cj-youtube-tv-container <?php echo esc_attr($settings['layout']); ?> <?php if ($settings['playlist']) { echo 'has-playlist'; } ?>">
            <div id="cj-youtube-tv-<?php echo $widget_id; ?>" class="cj-youtube-tv" data-tvapikey="<?php echo esc_attr($settings['apikey']); ?>" data-username="<?php echo esc_attr($settings['username']); ?>" data-channelid="<?php echo esc_attr($settings['channelid']); ?>" data-browseplaylists="<?php if ($settings['playlist']) { echo 'true';} else {echo 'false';} ?>" data-maxvideo="<?php echo esc_attr($settings['maxvideo']); ?>" data-maxplaylist="<?php echo esc_attr($settings['maxplaylist']); ?>"></div>
        </div>
        <style type="text/css">
        <?php
        $viewport_lg = get_option('elementor_viewport_lg', true);
        if (empty($viewport_lg)) {
            $viewport_lg = 1025;
        }
        ?>
        @media screen and (min-width: <?php echo ($viewport_lg + 1) . 'px'; ?>) {
        .h-layout #cj-youtube-tv-<?php echo $widget_id; ?> .ytv-video {padding-bottom:0 !important;}.h-layout #cj-youtube-tv-<?php echo $widget_id; ?> .ytv-list {height:100% !important;}
        }
        @media screen and (max-width: <?php echo ($viewport_lg) . 'px'; ?>) {
            #cj-youtube-tv-<?php echo $widget_id; ?> .ytv-list a {padding: 15px 20px}#cj-youtube-tv-<?php echo $widget_id; ?> .ytv-list-header > a {padding-top:0;padding-bottom:0;}#cj-youtube-tv-<?php echo $widget_id; ?> .ytv-list-header > a > span {line-height: 60px;}#cj-youtube-tv-<?php echo $widget_id; ?> .ytv-list:after {top: 14px;font-size: 16px}#cj-youtube-tv-<?php echo $widget_id; ?> .ytv-video {right: 0;}#cj-youtube-tv-<?php echo $widget_id; ?> .ytv-list {width: 100%;top: auto;bottom: 0;}
            .ytv-video {padding-bottom:200px;}.ytv-list {height:200px;}
        }
        </style>
        <?php } else { ?>
        <div class="cj-youtube-tv-info"><?php esc_html_e( 'You must enter a', 'keystone-elements-addons' ); ?> <a href="http://help.wp4life.com/2017/07/21/get-tube-api-key/" target="_blank"><?php esc_html_e( 'YouTube API Key', 'keystone-elements-addons' ); ?>.</a></div>    
        <?php } ?>    
<?php }
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Youtube_TV() );
?>