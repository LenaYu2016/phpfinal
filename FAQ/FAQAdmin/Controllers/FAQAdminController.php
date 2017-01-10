<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/24/2016
 * Time: 1:39 PM
 */

namespace Project\FAQ\FAQAdmin\Controllers;


use Project\FAQ\FAQAdmin\libs\FileUpLoad;
use Project\FAQ\FAQAdmin\Models\FAQ;
use Project\FAQ\FAQAdmin\Models\FAQAdminModels;
use Project\FAQ\FAQAdmin\Models\FileOperationAdmin;

class FAQAdminController
{
    public function __construct()
    {

    }

    /**
     * init FAQ Admin Page
     *
     */

     function index(){
        //echo "this is Faq admin !!";
        $faqAdmin = new FAQAdminModels();
        $allQuestion = $faqAdmin->show('faq');
        $QuestionTableTitles ="";
        foreach ($allQuestion->rows[0] as $key=>$value){
            $QuestionTableTitles .= "<th>$key</th>";
        }
        $allRows = "";
        foreach ($allQuestion->rows as $row){
            $id = $row['question_id'];
            $file = $row['answers'];
            $allRows.="<tr>";
            foreach ($row as $key=>$value){
                $allRows .="<td>$value</td>";
            }
            $path="faq?route=FAQAdminController/DeleteFAQ/$id/$file";
            $path1="faq?route=FAQAdminController/EditFAQ/$id";
            $allRows .="<td><a href =\"$path\" class='delete'>Delete</a></td>";
            $allRows .="<td><a href =\"$path1\" class='edit'>Edit</a></td>";
            $allRows .="</tr>";
        }
        //var_dump($allQuestion);
        require_once $_SERVER['DOCUMENT_ROOT'] ."/FAQ/FAQAdmin/Views/FAQAdmin.php";
    }

    /**
     *
     * click button redirect edit faq page
     * @param $id
     *
     */

    public function EditFAQ($id){
        $error ="";

        $faq =new FAQ();
        $faqQuestion = new FAQAdminModels();
        $editFaq =$faqQuestion->showById('faq',$id);
        $question = $editFaq->rows[0];
        $oldFile = $question['answers'];
        $id =$question['question_id'];
         //var_dump();
        $editFAQForm ="<input type=\"hidden\" name='id' value ='$id'/>";
        foreach ($faq as $key=>$value){
           // var_dump($key);
            $v=$question[$key];
            if($key!="answers") {
                $editFAQForm .= "<div class=\"form-group\">
                <label class=\"control-label col-md-2\" for='$key'>$key :</label>
                <div class=\"col-md-10\">
                    <input class=\"form-control text-box single-line\" id='$key' name='$key' type='text' value='$v'>
                    <span class=\"field-validation-valid text-danger\"></span>
                </div>
                </div>";
            }else{
                $editFAQForm.= "<input type=\"hidden\" name='filename' value ='$v'/>";
            }
        }
        $fileInfo = new FileOperationAdmin();
        $fileInfo= $fileInfo->readFAQFile($oldFile);

        require_once $_SERVER['DOCUMENT_ROOT'] ."/FAQ/FAQAdmin/Views/FAQEdit.php";

    }


    /**
     * Post from edit page save faq change.
     *
     */
    public function EditFAQPost(){
      // var_dump($_POST);
        $content =  $_POST['editor1'] ."[FAQ-hit]:".$_POST['clickrate'];
        $faq = new FAQ();
        $faq->questions = $_POST['questions'];
        $faq->answers =$_POST['filename'];
        $faq->category = $_POST['category'];
        $id = $_POST['id'];
        $faqAdmin = new FAQAdminModels();
        $faqAdmin->updateFAQ($content,$faq,$id);
        require_once $_SERVER['DOCUMENT_ROOT'] ."/FAQ/FAQAdmin/Views/FAQEditSuccess.php";
    }


    /**
     *
     * Delete Faq Question
     * @param $id
     * @param $file
     *
     */
    public function DeleteFAQ($id, $file){
        //echo "This is delete FAQ $id";
        $faqAdmin = new FAQAdminModels();
        $faqAdmin->deleteFAQ($file,$id);
        header('Location: faq');
    }


    /**
     * Create a new FAQ question
     *
     *
     */
    public function CreateFAQ(){
        $error ="";
        $createFAQForm ="";
        $faq =new FAQ();
       // var_dump($faq);
        foreach ($faq as $key=>$value){
            if($key!="answers") {
                $createFAQForm .= "<div class=\"form-group\">
            <label class=\"control-label col-md-2\" for='$key'>$key :</label>
            <div class=\"col-md-10\">
                <input class=\"form-control text-box single-line\" id='$key' name='$key' type='text' value=''>
                <span class=\"field-validation-valid text-danger\"></span>
            </div>
            </div>";
            }

        }

        if(filter_input(INPUT_POST, 'route')){
//            var_dump($_POST);

            $file = $_FILES['upfile'];
            $faq = new FAQ();
            $faq->question = $_POST['questions'];
            $faq->category = $_POST['category'];
            $faqAdmin = new FAQAdminModels();
            $result = $faqAdmin->createFAQ($file, $faq);
            //$faq->question
            if($result==false){
                $error="update failed !!!!";
            }else {
                $error = "question is created !";
            }
        }

        require_once $_SERVER['DOCUMENT_ROOT'] ."/FAQ/FAQAdmin/Views/FAQCreate.php";
    }
}