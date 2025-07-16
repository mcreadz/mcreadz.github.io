<?php

// main class. handles plugin activation/deactivation, tabe creation, enqueue, and render of content

class Plugin_initiate
{
    private $table_name;
    private $form;
    private $table;

    function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'database_mc';

        $this->form = new Form_handler();
        $this->table = new Table_display();

        register_activation_hook( MC_FILE, [ $this, 'activate' ] );
        register_deactivation_hook( MC_FILE, [ $this, 'deactivate' ] );

        add_action( 'wp_enqueue_scripts', [ $this, 'register_enqueue' ] );
        
        add_shortcode('mc_code', [$this, 'render_plugin']);
    }

    function activate() {
        $this->create_table();

        flush_rewrite_rules();
    }

    function deactivate() {
        flush_rewrite_rules();
    }

    function create_table() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $this->table_name (
            id int ( 24 ) NOT NULL AUTO_INCREMENT,
            handle varchar ( 255 ) NOT NULL,
            email varchar ( 255 ) NOT NULL,
            expression varchar ( 255 ) DEFAULT NULL,
            symbol varchar ( 255 ) DEFAULT NULL,
            operation varchar ( 255 ) DEFAULT NULL,
            answer decimal ( 24, 2 ) NOT NULL,
            value1 decimal ( 24, 2 ) NOT NULL,
            value2 decimal ( 24, 2 ) NOT NULL,
            clock varchar ( 255 ) DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY ( id )
        ) $charset_collate;";

        require_once ( ABSPATH . 'wp-admin/includes/upgrade.php' );

        dbDelta ( $sql );
    }

    function register_enqueue() {
        wp_register_script('mc-plugin-script', plugins_url( 'js/script.js', MC_FILE ), [], null, true);

        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
        wp_enqueue_script('mc-plugin-script');
    }

    function render_plugin() {
        ob_start();
        
        $this->form->form_submission();
        $this->form->load_edit_data();
        $this->form->form_render();

        $this->table->table_deletion();
        $this->table->table_render();

        return ob_get_clean();
    }
}