<?php

class QuestionOrder
{
    private $_questions;

    public function __construct($questions = array("This Midterm is easy", "I like Midterms", "Today is Monday"))
    {
        $this->setQuestions($questions);
    }

    public function setQuestions($questions)
    {
        $this->_questions = $questions;
    }

    public function getQuestions()
    {
        return $this->_questions;
    }

    public function toString()
    {
        $string = "";
        if (!empty($this->_condiments)) {
            $string .= implode(" & ", $this->_condiments);
        }

        return $string;
    }
}


