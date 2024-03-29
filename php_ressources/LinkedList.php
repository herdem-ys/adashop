<?php

class LinkedList{

    private $_head = null;
    private $_list = array();

    public function addNode($val) {

        // add the first element
        if(empty($this->_list)) {
            $this->_head = $val;
            $this->_list[$val] = null;
            return;
        }

        $curr = $this->_head;

        while ($curr != null || $curr === 0) {

            // end of the list
            if($this->_list[$curr] == null) {
                $this->_list[$curr] = $val;
                $this->_list[$val] = null;
                return;
            }

            if($this->_list[$curr] < $val) {
                $curr = $this->_list[$curr];
                continue;
            }
            $this->_list[$val] = $this->_list[$curr];
            $this->_list[$curr] = $val;
            return;

        }

    }

    public function deleteNode($val) {

        if(empty($this->_list)) {
            return;
        }

        $curr = $this->_head;

        if($curr == $val) {

            $this->_head = $this->_list[$curr];
            unset($this->_list[$curr]);

            return;
        }

        while($curr != null || $curr === 0) {

            // end of the list
            if($this->_list[$curr] == null) {
                return;
            }

            if($this->_list[$curr] == $val) {
                $this->_list[$curr] = $this->_list[$val];
                unset($this->_list[$val]);
                return; 
            }

            $curr = $this->_list[$curr];
        }
    }

    function showList(){
        $curr = $this->_head;
        while ($curr != null || $curr === 0) {
            echo "-" . $curr;
            $curr = $this->_list[$curr];
        }


    }
}
