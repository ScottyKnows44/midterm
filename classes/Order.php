<?php

class QuestionOrder
{
    //Declare instance variables
    private $_questions;

    /** Default constructor
     * @param $questions the questions
     */
    public function __construct($questions = array("This Midterm is easy", "I like Midterms", "Today is Monday"))
    {
        $this->setQuestions($questions);
    }

    /** Set the questions
     *  @param $questions the questions
     */
    public function setQuestions($questions)
    {
        $this->_questions = $questions;
    }

    /**
     * @return string the Questions
     */
    public function getQuestions()
    {
        return $this->_questions;
    }

    /** toString() returns a String
     *  @return string
     */
    public function toString()
    {
        $string = "";
        if (!empty($this->_condiments)) {
            $string .= implode(" & ", $this->_condiments);
        }

        return $string;
    }
}

/* For testing purposes only */
/*
$order = new FoodOrder("pizza", "lunch", array("parmesan", "red pepper flakes"));
echo $order->toString() . "<br>";
$order2 = new FoodOrder();
echo $order2->toString() . "<br>";
$order3 = new FoodOrder("tacos", "dinner");
$order3->setCondiments(array("taco sauce", "sour cream"));
echo $order3->toString() . "<br>";
*/
