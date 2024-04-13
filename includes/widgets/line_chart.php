<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Line_Chart extends Widget_Base {

	public function get_name() {
		return 'cj-line_chart';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Line Chart', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-lib-chart', 'cj-line_chart' ];
	}

	public function get_icon() {
		return 'eicon-number-field';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'line_chart_content',
  			[
  				'label' => esc_html__( 'Line Chart', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
        );
        
        $this->add_control(
			'labels',
			[
                'label' => esc_html__( 'Labels', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Write multiple label with comma (,) separator.', 'keystone-elements-addons' ),
                'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'January, February, March'
			]
        );
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'item_label',
			[
                'label' => esc_html__( 'Label', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Dataset 1', 'keystone-elements-addons' ),
			]
        );

        $repeater->add_control(
			'item_data',
			[
                'label' => esc_html__( 'Data', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Write data values with comma (,) separator.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '100, 70, -30'
			]
        );

        $repeater->add_control(
			'item_point_style',
			[
				'label' => esc_html__( 'Point Style', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'circle',
				'options' => [
					'circle'  => esc_html__( 'Circle', 'keystone-elements-addons' ),
                    'cross'  => esc_html__( 'Cross', 'keystone-elements-addons' ),
                    'crossRot'  => esc_html__( 'Cross Rotated', 'keystone-elements-addons' ),
                    'dash'  => esc_html__( 'Dash', 'keystone-elements-addons' ),
                    'line'  => esc_html__( 'Line', 'keystone-elements-addons' ),
                    'rect'  => esc_html__( 'Rectangle', 'keystone-elements-addons' ),
                    'rectRounded'  => esc_html__( 'Rounded Rectangle', 'keystone-elements-addons' ),
                    'rectRot'  => esc_html__( 'Rotated Rectangle', 'keystone-elements-addons' ),
                    'star'  => esc_html__( 'Star', 'keystone-elements-addons' ),
                    'triangle'  => esc_html__( 'Triangle', 'keystone-elements-addons' )
				],
			]
        );

        $repeater->add_control(
			'item_point_size',
			[
                'label' => esc_html__( 'Point Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 99,
				'step' => 1,
				'default' => 5
			]
        );

        $repeater->add_control(
			'item_style',
			[
				'label' => esc_html__( 'Line Style', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'Unfilled',
				'options' => [
					'Unfilled'  => esc_html__( 'Unfilled', 'keystone-elements-addons' ),
                    'Filled'  => esc_html__( 'Filled', 'keystone-elements-addons' ),
                    'Dashed'  => esc_html__( 'Dashed', 'keystone-elements-addons' )
				],
			]
        );

        $repeater->add_control(
			'item_border_width',
			[
                'label' => esc_html__( 'Line Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 99,
				'step' => 1,
				'default' => 1
			]
		);
        
        $repeater->add_control(
			'item_border',
			[
				'label' => esc_html__( 'Line Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(255, 99, 132, 1)'
			]
        );
        
        $repeater->add_control(
			'item_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(255, 99, 132, 0.5)'
			]
        );

        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Items', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
					[
						'item_label' => esc_html__( 'Dataset 1', 'keystone-elements-addons' ),
						'item_data' => '100, 70, -30'
					],
					[
						'item_label' => esc_html__( 'Dataset 2', 'keystone-elements-addons' ),
						'item_data' => '100, -70, 30'
					],
				],
				'title_field' => '{{{ item_label }}}',
			]
		);
		
		$this->end_controls_section();  

		$this->start_controls_section(
			'section_general_style',
			[
				'label' => esc_html__( 'General', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'font_family',
			[
				'label' => esc_html__( 'Font Family', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '"Helvetica Neue", "Helvetica", "Arial", sans-serif',
				'options' => [
					'"Helvetica Neue", "Helvetica", "Arial", sans-serif'  => esc_html__( 'Helvetica Neue', 'keystone-elements-addons' ),
					'Georgia, serif'  => esc_html__( 'Georgia', 'keystone-elements-addons' ),
					'"Palatino Linotype", "Book Antiqua", Palatino, serif'  => esc_html__( 'Palatino Linotype', 'keystone-elements-addons' ),
					'"Times New Roman", Times, serif'  => esc_html__( 'Times New Roman', 'keystone-elements-addons' ),
                    'Arial, Helvetica, sans-serif'  => esc_html__( 'Arial', 'keystone-elements-addons' ),
                    '"Arial Black", Gadget, sans-serif'  => esc_html__( 'Arial Black', 'keystone-elements-addons' ),
                    '"Comic Sans MS", cursive, sans-serif'  => esc_html__( 'Comic Sans', 'keystone-elements-addons' ),
					'Impact, Charcoal, sans-serif'  => esc_html__( 'Impact', 'keystone-elements-addons' ),
					'"Lucida Sans Unicode", "Lucida Grande", sans-serif'  => esc_html__( 'Lucida Sans', 'keystone-elements-addons' ),
					'Tahoma, Geneva, sans-serif'  => esc_html__( 'Tahoma', 'keystone-elements-addons' ),
					'"Trebuchet MS", Helvetica, sans-serif'  => esc_html__( 'Trebuchet', 'keystone-elements-addons' ),
					'Verdana, Geneva, sans-serif'  => esc_html__( 'Verdana', 'keystone-elements-addons' ),
					'"Courier New", Courier, monospace'  => esc_html__( 'Courier New', 'keystone-elements-addons' ),
					'"Lucida Console", Monaco, monospace'  => esc_html__( 'Lucida Console', 'keystone-elements-addons' )
				],
			]
		);
		
		$this->add_control(
			'font_size',
			[
                'label' => esc_html__( 'Font Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 999,
				'step' => 1,
				'default' => 12
			]
		);

		$this->add_control(
			'font_color',
			[
				'label' => esc_html__( 'Font Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#252525'
			]
        );

        $this->end_controls_section();  

		$this->start_controls_section(
			'section_legend_style',
			[
				'label' => esc_html__( 'Legend', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'legend_position',
			[
				'label' => esc_html__( 'Position', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
                    'top'  => esc_html__( 'Top', 'keystone-elements-addons' ),
                    'left'  => esc_html__( 'Left', 'keystone-elements-addons' ),
                    'bottom'  => esc_html__( 'Bottom', 'keystone-elements-addons' ),
                    'right'  => esc_html__( 'Right', 'keystone-elements-addons' )
				],
			]
		);

        $this->add_control(
			'legend_box_width',
			[
                'label' => esc_html__( 'Box Width', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Width of coloured box.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 999,
				'step' => 1,
				'default' => 40
			]
        );
        
        $this->add_control(
			'legend_font_size',
			[
                'label' => esc_html__( 'Font Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 999,
				'step' => 1,
				'default' => 12
			]
		);

        $this->add_control(
			'legend_color',
			[
				'label' => esc_html__( 'Font Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#cc0000'
			]
        );

        $this->add_control(
			'legend_padding',
			[
                'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 999,
				'step' => 1,
				'default' => 10
			]
		);
        
        $this->end_controls_section();  

		$this->start_controls_section(
			'section_gridline_style',
			[
				'label' => esc_html__( 'Gridlines', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'x_axis',
			[
				'label' => esc_html__( 'Display X Axis Gridlines', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'Yes', 'keystone-elements-addons' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'No', 'keystone-elements-addons' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'true',
				'toggle' => false,
			]
        );

        $this->add_control(
			'gridline_border_width_x',
			[
                'label' => esc_html__( 'X Axis Line Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 99,
				'step' => 1,
				'default' => 1
			]
		);
        
        $this->add_control(
			'x_axis_color',
			[
				'label' => esc_html__( 'X Axis Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.1)'
			]
        );

        $this->add_control(
			'x_zero_line_color',
			[
				'label' => esc_html__( 'X Axis Zero Line Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.1)'
			]
        );

        $this->add_control(
			'y_axis',
			[
				'label' => esc_html__( 'Display Y Axis Gridlines', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'Yes', 'keystone-elements-addons' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'No', 'keystone-elements-addons' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'true',
				'toggle' => false,
			]
        );

        $this->add_control(
			'gridline_border_width_y',
			[
                'label' => esc_html__( 'Y Axis Line Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 99,
				'step' => 1,
				'default' => 1
			]
		);

        $this->add_control(
			'y_axis_color',
			[
				'label' => esc_html__( 'Y Axis Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.1)'
			]
        );

        $this->add_control(
			'y_zero_line_color',
			[
				'label' => esc_html__( 'Y Axis Zero Line Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.1)'
			]
		);
		
		$this->end_controls_section();  

		$this->start_controls_section(
			'section_tooltip_style',
			[
				'label' => esc_html__( 'Tooltip', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tooltip_text_align',
			[
				'label' => esc_html__( 'Text Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => false,
			]
		);

		$this->add_control(
			'tooltip_font_size',
			[
                'label' => esc_html__( 'Font Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 999,
				'step' => 1,
				'default' => 12
			]
		);
		
		$this->add_control(
			'tooltip_color',
			[
				'label' => esc_html__( 'Font Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(255, 255, 255, 1)'
			]
		);
		
		$this->add_control(
			'tooltip_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.8)'
			]
		);
		
		$this->add_control(
			'tooltip_padding',
			[
                'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 999,
				'step' => 1,
				'default' => 10
			]
		);

		$this->add_control(
			'tooltip_border_radius',
			[
                'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 999,
				'step' => 1,
				'default' => 10
			]
		);

		$this->add_control(
			'tooltip_boxes',
			[
				'label' => esc_html__( 'Display Color Boxes', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'Yes', 'keystone-elements-addons' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'No', 'keystone-elements-addons' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'true',
				'toggle' => false,
			]
		);
		
		$this->add_control(
			'tooltip_title_margin',
			[
                'label' => esc_html__( 'Title Margin Bottom', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 999,
				'step' => 1,
				'default' => 6
			]
		);
        
        $this->end_controls_section();
  
	}

	/**
	 * Render 
	 */
	protected function render( ) {
        $settings = $this->get_settings_for_display();
        $widget_id = $this->get_id();
        if (is_rtl()) {
            $rtl = 'true';
            $direction = 'rtl';
        } else {
            $rtl = 'false';
            $direction = 'ltr';
        }
        if ( $settings['list'] ) {
            foreach ( $settings['list'] as $item ) { 
                echo '<div class="kea-line-chart-data" style="display:none;" data-label="' . $item['item_label'] . '" data-value="' . $item['item_data'] . '" data-bgcolor="' . $item['item_bg'] . '" data-bcolor="' . $item['item_border'] . '" data-lstyle="' . $item['item_style'] . '" data-lbwidth="' . $item['item_border_width'] . '" data-pointsize="' . $item['item_point_size'] . '" data-pointstyle="' . $item['item_point_style'] . '"></div>';
            }
        }
        ?>
			<div class="kea-line-chart-container" style="width: 100%;"  data-fontfamily="<?php echo esc_attr($settings['font_family']); ?>" data-fcolor="<?php echo $settings['font_color']; ?>" data-fsize="<?php echo $settings['font_size']; ?>" data-labels="<?php echo $settings['labels']; ?>" data-xaxis="<?php echo $settings['x_axis']; ?>" data-yaxis="<?php echo $settings['y_axis']; ?>" data-xcolor="<?php echo $settings['x_axis_color']; ?>" data-ycolor="<?php echo $settings['y_axis_color']; ?>" data-xzero="<?php echo $settings['x_zero_line_color']; ?>" data-yzero="<?php echo $settings['y_zero_line_color']; ?>" data-lposition="<?php echo $settings['legend_position']; ?>" data-tdirection="<?php echo $direction; ?>" data-lcolor="<?php echo $settings['legend_color']; ?>" data-lbox="<?php echo $settings['legend_box_width']; ?>" data-lfontsize="<?php echo $settings['legend_font_size']; ?>" data-lpadding="<?php echo $settings['legend_padding']; ?>" data-tooltipcolor="<?php echo $settings['tooltip_color']; ?>" data-tooltipbg="<?php echo $settings['tooltip_bg']; ?>" data-tooltipfsize="<?php echo $settings['tooltip_font_size']; ?>" data-tooltippadding="<?php echo $settings['tooltip_padding']; ?>" data-tooltipradius="<?php echo $settings['tooltip_border_radius']; ?>" data-tooltipboxes="<?php echo $settings['tooltip_boxes']; ?>" data-tooltipalign="<?php echo $settings['tooltip_text_align']; ?>" data-tooltiptmargin="<?php echo $settings['tooltip_title_margin']; ?>" data-gbwx="<?php echo $settings['gridline_border_width_x']; ?>" data-gbwy="<?php echo $settings['gridline_border_width_y']; ?>">
		        <canvas id="kea-line-chart-<?php echo $widget_id; ?>" class="kea-line-chart"></canvas>
	        </div>
	<?php
    } 

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Line_Chart() );