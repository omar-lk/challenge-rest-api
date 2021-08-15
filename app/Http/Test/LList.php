<?php


namespace App\Http\Test;


class LList
{

    // public $val = 0;
    public function __construct()
    {
        $this->head = null;
        // $this->val = 0;
    }
    public $head;

    public function PrintMe()
    {
        $item = new Node();
        $item = $this->head;

        if($item != null) {
            echo "content: ";
            while($item != null) {
            echo $item->data." ";
            $item = $item->next;
            }
            } else {
            echo "is empty";
            }
    }
    public function getnumber()
    {
        $item = new Node();
        $item = $this->head;

        if($item != null) {
            $number="";
            while($item != null) {
            $number=$number.$item->data;
            $item = $item->next;
            }
            } else {
            
            echo "is empty";
            }
            return $number;
    }
    public function sum($l1,$l2)
    {    
        
        $sum= (int)$l1->getnumber()+(int)$l2->getnumber();
        
        echo "<br> sum:".$sum;
    }
}
