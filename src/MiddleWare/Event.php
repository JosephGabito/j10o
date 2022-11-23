<?php
namespace Dunhakdis\MiddleWare;

/**
 * A sample WordPress add_action/do_action event 
 */
class Event {

    protected $name = '';
    protected $accepted_args = 0;
    protected $priority = 10;
    protected $callable = null;

    public function set_name( $name ) {
        $this->name = $name;
    }

    public function set_accepted_args( $num_args = 0 ) {
        $this->num_args = 0;
    }

    public function set_priority( $priority = 10 ) {
        $this->priority = 10;
    }

    public function set_callable( callable $func = null ) {
        $this->callable = $func;
    }

    public function emit() {

        add_action( $this->name, $this->callable, $this->priority, $this->accepted_args );

    }

    public function dispatch( $args ) {

        do_action( $this->name, $args );

    }

}
