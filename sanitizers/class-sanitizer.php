<?php
/**
 * Sanitizer
 *
 * @package Google\AMP_Remove_Noscript
 */

namespace Google\AMP_Remove_Noscript;

use AMP_Base_Sanitizer;
use DOMElement;
use DOMXPath;

/**
 * Class Sanitizer
 */
class Sanitizer extends AMP_Base_Sanitizer {

	/**
	 * Sanitize.
	 */
	public function sanitize() {
		$xpath = new DOMXPath( $this->dom );
		// Check if no script has image as child.
		$noscripts = $xpath->query( '//noscript/img' );

		if( $noscripts instanceof \DOMNodeList && $noscripts->length > 0 ) {
			foreach ( $noscripts as $noscript ) {
				$noscript->parentNode->removeChild( $noscript );
			}
		}
	}
}
