<?php

namespace app\controllers;

use app\model\Feedback;

class FeedbackController extends Controller
{
    

    public function actionFeedback()
    {
        $feedback = new Feedback();
        
        $feedbackItem = $feedback->getAlltoId(0);

        echo $this->renderLayouts("feedback", [
            "feedback" => $feedbackItem
        ]);
    }
}
