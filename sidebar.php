<div class="col-md-3 sidebar">

	<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

						<div class="alert alert-message">

							<h3>Sidebar Setup</h3>
							<p>Please add widgets to the main sidebar to have them display here.</p>

						</div>

					<?php endif; ?>



</div>
