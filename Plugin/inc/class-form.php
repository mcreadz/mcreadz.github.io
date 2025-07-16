<?php

class Form_handler
{
    private $table_name;
    private $edit_id = null;
    private $edit_data = null;

    function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'database_mc';
    }

    function form_submission() {
        global $wpdb;

        if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' && isset( $_POST[ 'calc_submit' ] ) ) {
            $handle = sanitize_text_field( $_POST[ 'handle' ] ?? '' );
            $email = sanitize_text_field( $_POST[ 'email' ] ?? '' );
            $expression = $_POST[ 'val1' ] . " " . $_POST[ 'symbol' ] . " " . $_POST[ 'val2' ] . " =";
            $symbol = sanitize_text_field( $_POST[ 'symbol' ] ?? '' );
            $operation = sanitize_text_field( $_POST[ 'operation' ] ?? '' );
            $value1 = intval( $_POST[ 'val1' ] ?? 0 );
            $value2 = intval( $_POST[ 'val2' ] ?? 0 );
            $answer = intval( $_POST[ 'ans' ] ?? 0 );
            $id = isset( $_POST[ '_id_' ] ) ? intval( $_POST[ '_id_' ] ) : null;
            $nonce = $_POST[ 'nonce' ] ?? '';
            
            if (!wp_verify_nonce($nonce, '_form_')) {
                echo '<p style="color:red;">Security check failed.</p>';
                return;
            }

            if ( $handle && $email ) {
                global $wpdb;

                if ( $id ) {
                    $wpdb->update( $this->table_name, [
                        'handle'     => $handle,
                        'email'      => $email,
                        'expression' => $expression,
                        'answer'     => $answer,
                        'value1'     => $value1,
                        'value2'     => $value2,
                        'operation'  => $operation,
                        'symbol'     => $symbol
                    ], [ 'id' => $id ] );
                    
                } else {
                    $wpdb->insert( $this->table_name, [
                        'handle'     => $handle,
                        'email'      => $email,
                        'expression' => $expression,
                        'answer'     => $answer,
                        'value1'     => $value1,
                        'value2'     => $value2,
                        'operation'  => $operation,
                        'symbol'     => $symbol
                    ] );
                }

                wp_safe_redirect( remove_query_arg( [ 'edit' ] ) );
                exit;
            }
        }
    }

    function load_edit_data() {
        if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
            global $wpdb;

            $id = intval($_GET['edit']);
            $this->edit_id = $id;
            $this->edit_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$this->table_name} WHERE id = %d", $id));
        }
    }

    function form_render() {
        $handle = $this->edit_data->handle ?? '';
        $email = $this->edit_data->email ?? '';
        $value1 = $this->edit_data->value1 ?? '';
        $value2 = $this->edit_data->value2 ?? '';
        $symbol = $this->edit_data->symbol ?? '';
        $operator = $this->edit_data->operation ?? 'Select Operator';
        $answer = $this->edit_data->answer ?? '';

        $id = $this->edit_id;

        $title = $id ? '! ' . $handle : ' Guest!';
        $submit_label = $id ? 'Update' : 'Submit';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="text-center h1 pt-2 pb-4">
                        Two Value Calculator
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mx-auto text-center">  
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#calcModal">
                    Open Calculator
                    </button>
                </div>
            </div>

            <div class="modal fade <?php echo $id ? 'show d-block' : ''; ?>" id="calcModal" tabindex="-1" aria-labelledby="calcModalLabel" aria-hidden="true" <?php echo $id ? 'style="background-color: rgba(0,0,0,0.5);"' : ''; ?>>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="calcModalLabel">Welcome<?php echo esc_attr( $title ); ?></h1>
                        </div>
                    
                        <div class="modal-body">
                            <form method="POST">
                                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( '_form_' ); ?>">
                                <?php if ( $id ): ?>
                                    <input type="hidden" name="_id_" value="<?php echo esc_attr( $id ); ?>">
                                <?php endif; ?>

                                <div class="mb-3">
                                    <input type="text" class="form-control" name="handle" value="<?php echo esc_attr( $handle ); ?>" aria-describedby="nameHelp" placeholder="Name" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" value="<?php echo esc_attr( $email ); ?>" aria-describedby="emailHelp" placeholder="E-mail" required>
                                </div>
                                <div class="input-group mb-3 text-center">
                                    <input type="text" onkeypress="return /[.0-9]/i.test(event.key)" id="num1" name="val1" value="<?php echo esc_attr( $value1 ); ?>" class="form-control" placeholder="value 1" style="text-align: center;">
                                    <span name="operator" class="input-group-text"><?php echo esc_attr( $operator ); ?></span>
                                    <input type="text" onkeypress="return /[.0-9]/i.test(event.key)" id="num2" name="val2" value="<?php echo esc_attr( $value2 ); ?>" class="form-control" placeholder="value 2" style="text-align: center;">
                                </div>
                                <div class="mb-3">
                                    <button type="button" onclick="calcAdd()" class="btn btn-warning">+</button>
                                    <button type="button" onclick="calcSub()" class="btn btn-warning">-</button>
                                    <button type="button" onclick="calcMul()" class="btn btn-warning">x</button>
                                    <button type="button" onclick="calcDiv()" class="btn btn-warning">/</button>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text">Answer </span>
                                    <input type="text" class="form-control" name="ans" value="<?php echo esc_attr( $answer ); ?>" readonly>
                                </div>
                                <div class="pt-3">
                                    <input type="hidden" name="symbol" value="<?php echo esc_attr( $symbol ); ?>">
                                    <input type="hidden" name="operation" value="<?php echo esc_attr( $operator ); ?>">
                                    <input type="submit" name="calc_submit" class="btn btn-primary" value="<?php echo esc_attr( $submit_label ); ?>">
                                </div>         
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" onclick="clearVal()" class="btn btn-danger">clear</button>
                            <?php if (!$id): ?>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <?php else: ?>
                                <a href="<?php echo esc_url(remove_query_arg('edit')); ?>" class="btn btn-secondary">Close</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}