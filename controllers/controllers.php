<?php

class Controllers
{
    private $_f3;

    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    public function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    public function survey($f3)
    {
        $questions = getMidtermQuestions();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (!$this->$_POST['name'] == "") {
                $this->_f3->set('errors["name"]', "Need a name.");
            }
            if(in_array($this->$_POST['questions'], $questions) == false){
                $this->_f3->set('errors["questions"]', "Need to select all that apply.");
            }

            if(empty($this->_f3->get('errors'))){
                $order = new QuestionOrder();
                $_SESSION['order'] = $order;
                $_SESSION['order']->setQuestions($_POST['questions']);
                $_SESSION['name'] = $_POST['name'];
                $this->_f3->reroute('summary');
            }

        }

        $this->_f3->set('questions', $questions);
        $this->_f3->set('selectedQuestion', $_POST['questions']);
        $view = new Template();
        echo $view->render('views/survey.html');

    }

    public function summary()
    {

        $view = new Template();
        echo $view->render('views/summary.html');

        session_destroy();
    }

}