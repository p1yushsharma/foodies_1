( function( api ) {

	// Extends our custom "bakery-treats" section.
	api.sectionConstructor['bakery-treats'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );