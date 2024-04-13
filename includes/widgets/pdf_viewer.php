<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_PDF_Viewer extends Widget_Base {

	public function get_name() {
		return 'cj-pdf_viewer';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'PDF Viewer', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'cj-pdf_viewer' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-pdf_viewer' ];
	}

	public function get_icon() {
		return 'eicon-document-file';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'pdf_viewer_content',
  			[
  				'label' => esc_html__( 'PDF Viewer', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
          ); 
          
        $this->add_control(
			'pdf_link',
			[
				'label' => esc_html__( 'Select File', 'keystone-elements-addons' ),
				'type'	=> 'kea-file-select',
				'placeholder' => esc_html__( 'URL to File', 'keystone-elements-addons' ),
                'default' => KEA_PLUGINS_URL . 'assets/img/sample.pdf'
			]
        );

        $this->add_control(
			'pdf_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );

        $this->add_control(
			'fallback', [
				'label' => esc_html__( 'Fallback Message', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
				'default' => esc_html__( 'Your browser does not support inline PDFs. Click here to view the file.', 'keystone-elements-addons' )
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'pdf_viewer_style',
			[
				'label' => esc_html__( 'PDF Viewer', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_responsive_control(
			'pdf_align',
			[
				'label' => esc_html__( 'Horizontal Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'keystone-elements-addons' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-h-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'keystone-elements-addons' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .pdfobject-container-container' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

        $this->add_responsive_control(
			'pdf_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .pdfobject-container' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_responsive_control(
			'pdf_height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem', 'vh' ],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'vh' => [
						'min' => 0,
						'max' => 100,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 600,
				],
				'selectors' => [
					'{{WRAPPER}} .pdfobject-container' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'pdf_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pdf_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .pdfobject-container'
			]
		);
        
        $this->add_control(
			'pdf_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .pdfobject-container' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pdf_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .pdfobject-container'
			]
        );
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'pdf_fallback_style',
			[
				'label' => esc_html__( 'Fallback Message', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pdf_fallback_typography',
				
				'selector' => '.kea-pdf-viewer-msg a',
			]
		);

        $this->add_control(
			'pdf_fallback_color',
			[
				'label' => esc_html__( 'Font Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .kea-pdf-viewer-msg a' => 'color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'pdf_fallback_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#cc0000',
				'selectors' => [
					'{{WRAPPER}} .kea-pdf-viewer-msg' => 'background-color: {{VALUE}};'
				]
			]
		);

        $this->add_responsive_control(
			'pdf_fallback_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-pdf-viewer-msg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'default' => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => true,
                ]
			]
		);
   
        $this->end_controls_section();
	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();
        ?>
        <div class="kea-pdf-viewer-container" style="display:flex;width:100%;flex-direction:column;">
            <div class="kea-pdf-viewer" style="max-width:100%;" data-pdfurl="<?php echo esc_url($settings['pdf_link']); ?>" data-fallbackmsg="<?php echo esc_attr($settings['fallback']); ?>"></div>
        </div>
	<?php
    } 

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_PDF_Viewer() );