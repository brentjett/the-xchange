<?php
/**
 * Base Utility Module
 * This base class extends FLBuilderModule to include some helper methods for templating and settings handling.
*/
class BRJUtilityModule extends FLBuilderModule {
	
	public function __construct( $args = [] ) {
		parent::__construct( array_merge( [
			'name' => '',
			'description' => '',
			'category' => __( 'Basic', 'the-xchange' ),
		], $args ) );
	}
	
	/**
	 * Class combination utility.
	 */	
	static public function classname( ...$args ) {
		$classes = [];
		foreach( $args as $arg ) {
			if ( is_string( $arg ) ) {
				$classes[] = $arg;
				
			} elseif ( is_array( $arg ) ) {
				$classes[] = self::handle_class_array( $arg );
			}
		}
		return implode( ' ', $classes );
	}
	
	static function handle_class_array( $arg = [] ) {
		$classes = [];
		foreach( $arg as $key => $val ) {
			if ( is_string( $val ) ) {
				$classes[] = $val;
			} elseif ( is_array( $val ) ) {
				foreach( $val as $name => $is_enabled ) {
					if ( is_bool( $is_enabled ) && $is_enabled ) {
						$classes[] = $name;
					} elseif ( is_string( $is_enabled ) ) {
						$classes[] = $is_enabled;
					}
				}
			}
		}
		return implode( ' ', $classes );
	}
	
	/**
	 * Helper for formatting a single html attribute
	 */
	static public function do_attr( $name, $value ) {
		return $value ? "{$name}='{$value}'" : '';
	}
	
	/**
	 * Helper for outputting a series of html attributes from a config array.
	 */
	static public function do_attributes( ...$args ) {
		$output = [];
		$attrs = array_merge( ...$args );
		
		foreach( $attrs as $key => $attr ) {
			if ( is_bool( $attr ) ) {
				$output[] = $key;
			} elseif ( 'class' === $key ) {
				$output[] = self::do_attr( 'class', self::classname( $attr ) );
			} elseif ( '' !== $attr ) {
				$output[] = self::do_attr( $key, $attr );
			}
		}
		return implode( ' ', $output );
	}
	
	/**
	 * Get attributes related to link fields
	 */
	static public function get_link_attributes( $key = '', $settings ) {
		$attrs = [];
		$rel = [];
		
		if ( isset( $settings->{$key} ) && '' !== $settings->{$key} ) {
			$attrs = [
				'href' => $settings->{$key},
			];
			
			// Handle target attribute
			if ( isset( $settings->{$key . '_target'} ) && '_self' !== $settings->{$key . '_target'} ) {
				$attrs['target'] = $settings->{$key . '_target'};
			}
			
			// Handle rel attribute
			if ( '_blank' == $settings->{$key . '_target'} ) {
				$rel[] = 'noopener noreferrer';
			}
			if ( isset( $settings->{$key . '_nofollow'} ) && 'yes' == $settings->{$key . '_nofollow'} ) {
				$rel[] = 'nofollow';
			}
			$attrs['rel'] = implode( ' ', $rel );
		}
		
		return $attrs;
	}
}