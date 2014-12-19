<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);


Class styler{

	public function __construct(){
		// $this->sortingArray = $ar_in;
		// $this->setArray($ar_in);
	}

	// takes input and spits it right back out.
	public function style($input){

		// wrap the input in divs with the wanted syling.



	}

}
Class InsertionSorter{

	private $sortingArray;
	
	public function __construct($ar_in){
		$this->sortingArray = $ar_in;
		// $this->setArray($ar_in);
	}

	public function setArray($ar_in){
		$this->sortingArray = $ar_in;
	}

	// set a timer. 
	public function insertionSort($ar_in){
		// Question: how are we going to measure running times? take a timing of it? log it everytime we iterate? Hmm.
		// now write it

		for($i = 1; $i < count($ar_in); $i++){
			// now we start at the beginning of the array and insert the item.
			// get the index
			$j = 0;
			while(array_key_exists($j, $ar_in) && $ar_in[$i] > $ar_in[$j] )
				$j++;
			array_splice($ar_in, $j, 0, $ar_in[$i]);

			// unset($ar_in[$i + 1]);
			if($i < $j)
				unset($ar_in[$i]);
			elseif($i != $j)
				unset($ar_in[$i + 1]);
			$ar_in = array_values($ar_in);

		}

		return $ar_in;
	}

	public function reverseInsertionSort($ar_in){
		for($i = (count($ar_in) - 2);  $i >= 0; $i--){
			
			$j = count($ar_in) - 1;

			while($j >= 0 && $ar_in[$i] < $ar_in[$j])
				$j--;
			array_splice($ar_in, $j, 0, $ar_in[$i]);

			if($i < $j)
				unset($ar_in[$i]);
			else
				unset($ar_in[$i + 1]);
			$ar_in = array_values($ar_in);
		}
		var_dump($ar_in);
		return $ar_in;

	}

	public function stupidSort($ar_in){
		$newArray = array();
		for($i = 0; $i < count($ar_in); $i++){
			$j = 0;
			while(array_key_exists($j, $newArray) && $newArray[$j] < $ar_in[$i]){
				++$j;
			}
			array_splice($newArray, $j, 0, $ar_in[$i]);
		}
		return $newArray;

	}
}

Class linearSearch{
	private $sortingArray;
	
	public function __construct($ar_in){
		$this->sortingArray = $ar_in;
		// $this->setArray($ar_in);
	}

	public function lSearch($ar_in, $search_key){
		for($i = 0; $i < count($ar_in); $i++){
			if($ar_in[$i] == $search_key)
				return $i;
		}
		return -1;
	}


}


Class Test{
	
	private $test_ar = array(5,2,4,6,1,3);

	public function __construct(){

	}

	public function testInsertionSorter(){

		$insertionSorter = new InsertionSorter($this->test_ar);
		
		// create a sorted array.
		$sorted_real = $this->test_ar;
		sort($sorted_real);

		$insetionSortedTest = $insertionSorter->insertionSort($this->test_ar);
		$reverseInsertionSortedTest = $insertionSorter->reverseInsertionSort($this->test_ar);
		$stupidSortedTest = $insertionSorter->stupidSort($this->test_ar);

		// verify the two arrays are equal
		// Really we should have all of these seperated into their own sections so that we can identify where the issue is quickly.

		$passedInsertionSort = true;
		for($i = 0; $i < count($sorted_real); $i++){
			$returned = $this->assertEquals($insetionSortedTest[$i], $sorted_real[$i], "There is a problem value $insetionSortedTest[$i] must equal value $sorted_real[$i]");
			if(!$returned)
				$passedInsertionSort = false;
		}
		if($passedInsertionSort){
			echo "We have passed the insertion Sort!<br />";
		}

		$passedReverseInsertionSort = true;
		
		for($i = 0; $i < count($sorted_real); $i++){
			$returned = $this->assertEquals($reverseInsertionSortedTest[$i], $sorted_real[$i], "There is a problem value $reverseInsertionSortedTest[$i] must equal value $sorted_real[$i]");
			if(!$returned)
				$passedReverseInsertionSort = false;
		}
		if($passedReverseInsertionSort){
			echo "We have passed the insertion Sort!";
		}

		// echo "Gone through the reverse insertion Sort Test<br /><br />";

		$passedStupidSort = true;
		
		for($i = 0; $i < count($sorted_real); $i++){
			$returned = $this->assertEquals($stupidSortedTest[$i], $sorted_real[$i], "There is a problem value $stupidSortedTest[$i] must equal value $sorted_real[$i]");
			if(!$returned)
				$passedStupidSort = false;
		}
		if($passedStupidSort){
			echo "We have passed the stupid insertion Sort <br />";
		}
		// echo "Gone through the reverse insertion Sort Test<br /><br />";

		// linear search section
		$linearSearchObj = new linearSearch($this->test_ar);

		// test the linear search algorithm.
		$testIndex = $linearSearchObj->lSearch($this->test_ar, 4);
		$realIndex = array_search(4, $this->test_ar);
		$this->assertEquals($testIndex, $realIndex, "There is a problem with linearly looking for an object $testIndex should equal $realIndex");



	}

	public function assertEquals($input1, $input2, $message){
		if($input1 != $input2){
			echo $message . "<br />";
			return false;
		}
		return true;

	}



	public function runSuite(){
		// $methods = get_class_methods(Test);
		// foreach($method in $methods){
		// 	if($method != "runSuite")
		// 		call_user_func(

		// }
	}
}


Class EulerQuestions{
	public function __construct(){

	}	
}

//run the test suite
// refactor to use the styler
$tests = new Test();
$tests->testInsertionSorter();




// Test declarations 

echo "<h2>This site is being used to create algorithms from the book.</h2>";
?>
