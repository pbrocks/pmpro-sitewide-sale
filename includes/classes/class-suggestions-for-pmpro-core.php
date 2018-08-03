<?php

// namespace PMPro_Sitewide_Sale\includes\classes;
defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

class Suggestions_for_PMPro_Core {
	/**
	 *
	 * Initial plugin setup
	 *
	 * @package pmpro-sitewide-sale/includes
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'pmpro_add_ons' ) );
		// add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );
	}
	public static function pmpro_add_ons() {
		$slug = preg_replace( '/_+/', '-', __FUNCTION__ );
		$label = ucwords( preg_replace( '/_+/', ' ', __FUNCTION__ ) );
		add_submenu_page( 'pmpro-membershiplevels', __( $label, 'pmpro-add-ons-menu' ), __( $label, 'pmpro-add-ons-menu' ), 'manage_options', $slug . '.php', array( __CLASS__, __FUNCTION__ . '_page' ) );
	}

	public static function pmpro_add_ons_page() {
		echo '<div class="wrap">';
		echo '<h2>' . __FUNCTION__ . '</h2>';
		$screen = get_current_screen();
		echo '<h4 style="color:rgba(250,128,114,.7);">Current Screen is <span style="color:rgba(250,128,114,1);">' . $screen->id . '</span></h4>';
		self::pmpro_add_ons_page_tabs();

		echo '</div>';
	}

	public static function enqueue_scripts() {
		wp_register_style( 'pmpro-admin-page', plugins_url( 'includes/css/pmpro-admin-page.css', PMPROSWS_BASENAME ),  '1.0.1' );
		wp_enqueue_style( 'pmpro-admin-page' );
	}

	public static function pmpro_add_ons_page_tabs() {
		?>
		<div class='pmpro-card'>
			
			<input class='hide' type="radio" id="tab-1" name="tractor" checked='checked'/>
			<label for='tab-1'>Sitewide Sales</label>
			<article class='tab-1'>
				<section>
					<h2><a href='//escss.blogspot.com/'>EsCSS</a></h2>

					<p>
						<?php
						// $registered_banners = self::pmpro_get_page_tabs();
						echo '<pre>';
						print_r( $_SERVER );
						echo '</pre>';
						?>
					</p>
				</section>
			</article>
			
			<input class='hide' type="radio" id="tab-2" name="tractor"/>
			<label for='tab-2'>Tab 2</label>	
			<article class='tab-2'>
				<section>
					<h2><a href='//twitter.com/Kseso'>Kseso</a></h2>
					<p>Un ramajero Argonauta, Enredique amanuense de CSS.</p>
					<p>En Twitter, Blogger, Codepen, Facebook y G+</p>
				</section>
			</article>

			<input class='hide' type="radio" id="tab-3" name="tractor"/>
			<label for='tab-3'>Tab 3</label>
			
			<article class='tab-3'>		
				<img alt=''  src='//4.bp.blogspot.com/-As0ACLuq8kg/T6jx0HpX8jI/AAAAAAAAAbA/h2MzKDc2AeE/s512/type-15.jpg' />
				<section>
					<h2>Auto Hexagonal CSS Grid Layout & CSS custom properties</h2>
					<p>Todo lo que sigue, demo incluida, es sólo un mero divertimento. Un juego para ver la potencia de CSS sin necesidad de recurrir a otros lenguajes o…</p>
				</section>
			</article>
			
			<input class='hide' type="radio" id="tab-4" name="tractor"/>
			<label for='tab-4'>Tab 4</label>
			<article class='tab-4'>		
				<img alt=''  src='//4.bp.blogspot.com/-thkKp77xwrg/T6jxTtMz3pI/AAAAAAAAAZg/M7FCHTXAkiA/s1600/513.jpg' />
				<section>
					<h2>Modern HTML tabs with old school CSS tecnics</h2>
					<p>Hacía ya algún tiempo que no me sentía enredique y juguetón con CSS y dedicaba un rato a experimentar con alguna demo. Sólo por el placer de ver el resultado de ensayar con propiedades no muy trilladas de momento e ir cambiando sus valores.</p>

					<p>Todo por el placer de ver qué resulta si hago esto o cambio lo otro. Nada de buscar un resultado final para que pueda ser aplicado en producción.</p>

					<p>Pero si no hubiese lo primero (juego y experimentación) ¡qué aburrida sería la web desde hace mucho tiempo!</p>
				</section>
			</article>	
		</div>
		<?php
	}

	public static function pmpro_get_page_tabs() {
		$registered_banners = PMPro_SWS_Banners::pmpro_get_page_tabs();
		return $registered_banners;
	}

}
