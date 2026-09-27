( function () {
	'use strict';

	document.addEventListener( 'click', function ( e ) {
		var link = e.target.closest( '.makitweb-copy-id' );
		if ( ! link ) {
			return;
		}

		e.preventDefault();

		var postId = link.dataset.id;

		if ( navigator.clipboard && navigator.clipboard.writeText ) {
			navigator.clipboard.writeText( postId ).then( function () {
				showNotice( link );
			} );
		} else {
			// Fallback for browsers without Clipboard API.
			var textarea = document.createElement( 'textarea' );
			textarea.value = postId;
			textarea.style.cssText = 'position:fixed;opacity:0;';
			document.body.appendChild( textarea );
			textarea.select();
			document.execCommand( 'copy' );
			document.body.removeChild( textarea );
			showNotice( link );
		}
	} );

	function showNotice( link ) {
		// Avoid stacking notices if clicked repeatedly.
		var existing = link.parentNode.querySelector( '.makitweb-copy-id-notice' );
		if ( existing ) {
			existing.remove();
		}

		var notice = document.createElement( 'span' );
		notice.className = 'makitweb-copy-id-notice';
		notice.textContent = 'ID copied!';
		notice.style.cssText = 'margin-left:6px;color:#46b450;font-weight:600;';
		link.parentNode.insertBefore( notice, link.nextSibling );

		setTimeout( function () {
			notice.remove();
		}, 2000 );
	}
} )();
