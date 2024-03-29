<?php
/**
 * Advanced_Sidebar_Menu__Widget__Widget
 *
 * @author Mat Lipe
 *
 * @since  7.2.0
 */
abstract class Advanced_Sidebar_Menu__Widget__Widget extends WP_Widget {
	/**
	 * The current widget instance
	 *
	 * @var array
	 */
	protected $_instance;


	/**
	 * Store the instance to this class.
	 * We do this manually because there are filters etc which
	 * hit the instance before we get to self::form() and self::widget()
	 *
	 * @see   WP_Widget::form_callback()
	 *
	 * @param array $instance - widget settings.
	 * @param array $defaults - defaults for all widgets.
	 *
	 * @since 7.2.0
	 *
	 * @return array
	 */
	protected function set_instance( array $instance, array $defaults ) {
		$instance        = wp_parse_args( $instance, $defaults );
		$this->_instance = $instance;

		return $instance;

	}


	/**
	 * Checks if a widgets checkbox is checked.
	 *
	 * Checks first for a value then verifies the value = checked
	 *
	 * @param string $name - name of checkbox.
	 *
	 * @since 7.2.0
	 *
	 * @return bool
	 */
	public function checked( $name ) {
		return isset( $this->_instance[ $name ] ) && 'checked' === $this->_instance[ $name ];
	}


	/**
	 * Hide an element_key if a controlling_checkbox is checked.
	 *
	 * @param string $controlling_checkbox - Name of controlling_checkbox field which controls whether to hide this element or not.
	 * @param string $element_key          - Match the `element_to_reveal` passed to $this->checkbox() for the checkbox which controls this.
	 * @param bool   $reverse              - hide on check instead of show on check.
	 *
	 * @todo  Convert all uses of this method to supply the $element_key
	 *
	 * @since 7.2.0
	 * @since 7.2.2 Added the `element_key` argument.
	 *
	 * @return void
	 */
	public function hide_element( $controlling_checkbox, $element_key = null, $reverse = false ) {
		$hide = false;
		if ( ( $reverse && $this->checked( $controlling_checkbox ) ) || ( ! $reverse && ! $this->checked( $controlling_checkbox ) ) ) {
			$hide = true;
		}

		if ( null !== $element_key ) {
			?> data-js="<?php echo esc_attr( $this->get_field_id( $element_key ) ); ?>"
			<?php
		}
		// Append the hide to a global variable so it can be picked up only if the advanced-sidebar-menu JS is present.
		// Prevents hiding of elements when widgets are loaded in unique ways like ajax.
		if ( $hide ) {
			?>
			data-advanced-sidebar-menu-hide="1"
			<?php
		}
	}


	/**
	 * Outputs a <input type="checkbox" with id and name filled
	 *
	 * @param string      $name              - name of field.
	 * @param string|null $element_to_reveal - element to reveal/hide when box is checked/unchecked.
	 *
	 * @since 7.2.0
	 */
	public function checkbox( $name, $element_to_reveal = null ) {
		if ( empty( $this->_instance[ $name ] ) ) {
			$this->_instance[ $name ] = null;
		}

		?>
		<input
			id="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( $name ) ); ?>"
			type="checkbox"
			value="checked"
			data-js="advanced-sidebar-menu/widget/<?php echo esc_attr( $this->id_base ); ?>/<?php echo esc_attr( $name ); ?>"
			<?php echo ( null !== $element_to_reveal ) ? 'onclick="asm_reveal_element( \'' . esc_attr( $this->get_field_id( $element_to_reveal ) ) . '\')"' : ''; ?>
			<?php echo esc_html( $this->_instance[ $name ] ); ?>
		/>
		<?php

	}
}
