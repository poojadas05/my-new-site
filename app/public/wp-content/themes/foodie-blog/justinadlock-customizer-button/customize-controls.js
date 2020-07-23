( function( api ) {

	// Extends our custom "foodie-blog" section.
	api.sectionConstructor['foodie-blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
