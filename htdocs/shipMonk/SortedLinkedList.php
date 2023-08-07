<?php
class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}
	class SortedLinkedList {
		private $head;
		private $dataType;
	
		public function __construct($dataType) {
			$this->head = null;
			$this->dataType = $dataType;
		}
	
		public function insert($data) {
			if ($this->dataType === "integer" && !is_int($data)) {
				throw new InvalidArgumentException("Invalid data type. Expected: integer");
			} elseif ($this->dataType === "string" && !is_string($data)) {
				throw new InvalidArgumentException("Invalid data type. Expected: string");
			}
			}
	
			$newNode = new Node($data);
	
			if ($this->head === null || $this->head->data > $data) {
				$newNode->next = $this->head;
				$this->head = $newNode;
				return;
			}
	
			$current = $this->head;
			while ($current->next !== null && $current->next->data < $data) {
				$current = $current->next;
			}
	
			$newNode->next = $current->next;
			$current->next = $newNode;
		}
	
		public function display() {
			$current = $this->head;
			while ($current !== null) {
				echo $current->data . " -> ";
				$current = $current->next;
			}
			echo "NULL\n";
		}
	}
	
	// Example usage:
	$intList = new SortedLinkedList("integer");
	$intList->insert(4);
	$intList->insert(2);
	$intList->insert(8);
	$intList->insert(3);
	
	$intList->display();
	
	$stringList = new SortedLinkedList("string");
	$stringList->insert("Hello");
	$stringList->insert("World");
	$stringList->insert("SortedLinkedList");
	$stringList->insert("String");
	
	$stringList->display();
?>

