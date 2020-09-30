/**
 * React App Component.
 */
import { TextControl, Button } from "@wordpress/components";
import { __ } from "@wordpress/i18n";
import { useState } from "@wordpress/element";

const App = () => {
	const [inputControl, setInputControl] = useState('');

	return (
		<>
			<h2>{ __( 'React App Component', 'wp-script-demo' ) }</h2>
			<TextControl
				label={ __( 'Demo Text Control', 'wp-scripts-demo' ) }
				onChange={ ( value ) => setInputControl( value ) }
				value={ inputControl }
			/>
			<Button className="button">{ __( 'Save Changes', 'wp-scripts-demo' ) }</Button>
		</>
	);
}

export default App;
