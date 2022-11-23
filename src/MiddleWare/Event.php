<?php
namespace Dunhakdis\MiddleWare;

/**
 * A sample WordPress add_action/do_action event 
 */
class Event {

    protected $args = array();

    protected $callable = null;

    public function when( $args = array() ) {

        $this->args = array(
            'name' => $args['name'],
            'priority' => $args['priority'],
            'num_args' => $args['num_args']
        );

        return $this;

    }

    public function then( callable $func ) {

        $this->callable = $func;

        add_action( $this->args['name'], $this->callable, $this->args['priority'], $this->args['num_args'] );

        return $this;

    }

    public function _catch( callable $catch ) {

    }

}
