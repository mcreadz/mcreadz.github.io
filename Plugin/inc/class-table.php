<?php

class Table_display
{
    private $table_name;

    function table_deletion() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'database_mc';

        if ( isset( $_GET[ 'delete' ] ) && is_numeric( $_GET[ 'delete' ] ) ) {
            $id = intval( $_GET[ 'delete' ] );
            $nonce = $_GET[ 'nonce' ] ?? '';

            if ( ! wp_verify_nonce( $nonce, '_del_' . $id) ) {
                echo '<p style="color: red;">Invalid Permission. Deletion denied.</p>';
                return;
            }

            global $wpdb;
            $wpdb->delete( $table_name, [ 'id' => $id ] );

            $url = esc_url_raw( remove_query_arg( [ 'delete', 'nonce'] ) );
            wp_safe_redirect( $url );
            exit;
        }
    }

    function table_render() {
        ?>
        <div class="container">
            <div class="row-fluid mt-5">
                <div class="col-md-8 col-xs-6 mx-auto">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Name</th>
                                    <th class="text-center" scope="col">E-Mail</th>
                                    <th class="text-center" scope="col">Statement</th>
                                    <th class="text-center" scope="col">Answer</th>
                                    <th class="text-center" scope="col">Timestamp</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                global $wpdb;
                                $table_name = $wpdb->prefix . 'database_mc';

                                $results = $wpdb->get_results( "SELECT * FROM {$table_name} ORDER BY id DESC ");

                                if ( empty( $results ) ) {
                                    echo '<p style="color: red;">No entries found.</p>';
                                    return;
                                }

                                foreach ( $results as $row ) {
                                    $edit_url = esc_url( add_query_arg( 'edit', $row->id ) );

                                    $delete_url = esc_url( add_query_arg( [
                                        'delete' => $row->id,
                                        'nonce' => wp_create_nonce( '_del_' . $row->id )
                                        ]
                                    ) );
                                    
                                    echo '<tr>';
                                    echo    '<td>' . esc_html( $row->handle ) . '</td>';
                                    echo    '<td class="text-center">' . esc_html( $row->email ) . '</td>';
                                    echo    '<td class="text-center">' . esc_html( $row->expression ) . '</td>';
                                    echo    '<td class="text-center">' . esc_html( $row->answer ) . '</td>';
                                    echo    '<td class="text-center">' . esc_html( $row->clock ) . '</td>';
                                    echo    '<td class="text-center">';
                                    echo        '<a href="' . $edit_url . '" >Edit</a> | '; //data-bs-toggle="modal" data-bs-target="#calcModal"
                                    echo        '<a href="' . $delete_url . '" onclick="return confirm(\'Confirm Delete?\')">Delete</a></td>';       
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}