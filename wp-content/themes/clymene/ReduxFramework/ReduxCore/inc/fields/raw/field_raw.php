<?php



class ReduxFramework_raw extends ReduxFramework {



    /**

     * Field Constructor.

     *

     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function

     *

     * @since ReduxFramework 3.0.4

     */

    function __construct($field = array(), $value = '', $parent) {



        //parent::__construct( $parent->sections, $parent->args );

        $this->parent = $parent;

        $this->field = $field;

        $this->value = $value;

    }



    /**

     * Field Render Function.

     *

     * Takes the vars and outputs the HTML for the field in the settings

     *

     * @since ReduxFramework 1.0.0

     */

    function render() {



        // If align value is not set, set it to false, the default

        if (!isset($this->field['align'])) {

            $this->field['align'] = false;

        }



        // Set align flag.

        $doAlign = $this->field['align'];



        // The following could needs to be omitted if align is true.

        // Only print it if allign is false.

        if (false == $doAlign) {

            echo '<style>#' . $this->parent->args['opt_name'] . '-' . $this->field['id'] . ' {padding: 0;}</style>';

            echo '</td></tr></table><table class="form-table no-border redux-group-table" style="margin-top: -20px;"><tbody><tr><td>';

        }



        echo '<fieldset id="' . $this->parent->args['opt_name'] . '-' . $this->field['id'] . '" class="redux-field redux-container-' . $this->field['type'] . ' ' . $this->field['class'] . '" data-id="' . $this->field['id'] . '">';



        if (!empty($this->field['include']) && file_exists($this->field['include'])) {

            include( $this->field['include'] );

        }

        if (!empty($this->field['content']) && isset($this->field['content'])) {

            if (isset($this->field['markdown']) && $this->field['markdown'] == true) {

                require_once dirname(__FILE__) . "/parsedown.php";

                echo Parsedown::instance()->parse($this->field['content']);

            } else {

                echo htmlspecialchars_decode($this->field['content']);

            }

        }



        do_action('redux-field-raw-' . $this->parent->args['opt_name'] . '-' . $this->field['id']);



        echo '</fieldset>';



        // Only print is align is false.

        if (false == $doAlign) {

            echo '</td></tr></table><table class="form-table no-border" style="margin-top: 0;"><tbody><tr style="border-bottom: 0;"><th></th><td>';

        }

    }



}

