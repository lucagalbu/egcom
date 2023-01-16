<?php
class Elementor_Blog_List extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hello_world_widget_2';
	}

	public function get_title() {
		return esc_html__( 'Blog List', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'blog', 'list' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
		);

		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		$query_params = array(
			'post_type'=>'portfolio', 
			'post_status'=>'publish', 
			'posts_per_page'=>-1
		);

		$allPostsQuery = new WP_Query($query_params);

		if ($allPostsQuery -> have_posts()){
			?>
			<div class = "container-fluid">
				<div class = "grid">
					<!-- The following two containers are required by masonry to set a relative size for the articles -->
					<div class="grid-sizer"></div>
					<div class="gutter-sizer"></div>
					<?php while ( $allPostsQuery -> have_posts() ) { ?>
						<?php $allPostsQuery -> the_post();?>
							<div class = "grid-item">
								<div class = "card mb-4 d-flex flex-column align-items-center">
								<div class="blog_thumbnail">
									<a href=<?= get_post_permalink();?> target="_self">
										<img src=<?= the_post_thumbnail_url();?>></img>
									</a>
								</div>
								<p class="text-center mb-0"> <?=get_the_title();?> </p>
								<p class="text-center fw-light fst-italic"> <?=get_the_category()[0]->name;?></p>
								</div>
							</div>
					<?php } ?>
				</div>
			</div>
		<?php }else{ ?>
			<p>No posts :(!</p>
		<?php 
		}

		wp_reset_query();


		$settings = $this->get_settings_for_display();
		?>

		<p class="hello-world">
			<?php echo $settings['title']; ?>
		</p>

		<?php
	}
}
