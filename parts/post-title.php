<?php
if ( xchange_should_include_title() ) {
	if ( is_singular() ) {
		the_title( '<h1>', '</h1>' );
	} else {
		the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
	}
}