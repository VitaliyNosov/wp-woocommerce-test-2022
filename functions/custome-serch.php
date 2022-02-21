<?php 

// Кастомная форма поиска

function true_search_form( $form ) {
    $form = '	
		<form role="search" method="get" class="search-form" action="http://woocommrce-test/">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Search …" value="" name="s">
			</label>
			<input type="submit" class="search-submit" value="">
		</form>	
	'; // в эту переменную записываем новую поисковую форму
    return $form;
}
 
add_filter( 'get_search_form', 'true_search_form' );

?>