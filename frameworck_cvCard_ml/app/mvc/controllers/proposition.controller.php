<?php

class PropositionController extends Controller
{

  function ___construct($data = array())
  {
    parent::__construct($data);
  }
  private function generatePdf($idPost)
  {
    $project = new ProjectCh_manager();
    $this->data['getById'] = $project->getById($idPost);

    $security = new security();
    $pdf = new fpdfch();
    
    $pdf->AddPage();
    $pdf->FirstPage();

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Bookmark ('Information Personnel',false);
    $pdf->Cell(0,6,'Information Personnel',0,1);
    $pdf->Ln();

    $pdf->Content('Nom : ' . $security->html(utf8_decode($this->data['getById'][0]['name'])));
    $pdf->Content('Prenom : ' . $security->html(utf8_decode($this->data['getById'][0]['firstname'])));
    $pdf->Content('Adresse : ' . $security->html(utf8_decode($this->data['getById'][0]['adress'])));
    $pdf->Content('Code postal : ' . $security->html(utf8_decode($this->data['getById'][0]['cp'])));
    $pdf->Content('Pays : ' . $security->html(utf8_decode($this->data['getById'][0]['country'])));

    $pdf->Ln();

    $pdf->Content('lat : ' . $security->html(utf8_decode($this->data['getById'][0]['lat'])));
    $pdf->Content('lng : ' . $security->html(utf8_decode($this->data['getById'][0]['lng'])));
    
    $pdf->Ln();

    $pdf->Content('Email : ' . $security->html(utf8_decode($this->data['getById'][0]['email'])));
    $pdf->Content('Tel : ' . $security->html(utf8_decode($this->data['getById'][0]['tel'])));

    $pdf->Ln();

    $pdf->Content('Status legal : ' . $security->html(utf8_decode($this->data['getById'][0]['statusLegal'])));
    $pdf->Content('Denomination legal : ' . $security->html(utf8_decode($this->data['getById'][0]['denomination'])));

    $i = 0;
    $j = 0;
    if (is_array($this->data['getById'][0]['filesProject']) && $i < count($this->data['getById'][0]['filesProject'])) {
      $pdf->Ln();
      $pdf->Content("Fichier joins : ");
      while ($i < count($this->data['getById'][0]['filesProject'])) {
        if ($this->data['getById'][0]['filesProject'][$i]['tag'] == "denominationFile") {
          $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['filesProject'][$i]['name'])));
          $j++;
        }
        $i++;
      }
      if ($j > 0) {
        $pdf->Ln();
      }
    }

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Bookmark(utf8_decode("Reponse"),false);
    $pdf->Cell(0,6,utf8_decode("Reponse"),0,1);
    $pdf->Ln();

    $pdf->Content(utf8_decode('Moyen de réponse préféré: ') . $security->html(utf8_decode($this->data['getById'][0]['preference_answer'])));
    $pdf->Content(utf8_decode('Horraire de réponse préféré : De ') . $security->html(utf8_decode($this->data['getById'][0]['start_preference_answer'])) . utf8_decode(" à ") . $security->html(utf8_decode($this->data['getById'][0]['end_preference_answer'])));
    $pdf->Content(utf8_decode('Demande de devis : ') . $security->html(utf8_decode($this->data['getById'][0]['quotation'])));
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Bookmark(utf8_decode("Reponse attendu"),false);
    $pdf->Cell(0,6,utf8_decode("Reponse attendu"),0,1);
    $pdf->Ln();
    $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['answer'])));
    $pdf->Ln();

    if ($this->data['getById'][0]['presentation']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Présentation de l'entreprise"),false);
      $pdf->Cell(0,6,utf8_decode("Présentation de l'entreprise"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['presentation']))); 
    }

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Bookmark(utf8_decode("Description du projet"),false);
    $pdf->Cell(0,6,utf8_decode("Description du projet"),0,1);
    $pdf->Ln();

    if ($this->data['getById'][0]['contextProject']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Contexte du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Contexte du projet"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['contextProject']))); 
    }
    if ($this->data['getById'][0]['objectifProject']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Objectif du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Objectif du projet"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['objectifProject']))); 
    }
    if ($this->data['getById'][0]['constraintProject']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Contraintes du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Contraintes du projet"),0,1);
      $pdf->Ln();
      if ($this->data['getById'][0]['dateEndProjectBool']) {
        $pdf->Content(utf8_decode("Date maximum de fin de réalisation : ") . $security->html(utf8_decode($this->data['getById'][0]['dateEndProject']))); 
        $pdf->Ln();
      }
      else {
        $pdf->Content(utf8_decode("Date maximum de fin de réalisation : Non défini ")); 
        $pdf->Ln();
      }
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['constraintProject']))); 
    }
    if ($this->data['getById'][0]['typeApp']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Type d'application cible"),false);
      $pdf->Cell(0,6,utf8_decode("Type d'application cible"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['typeApp'])));
      $pdf->Ln();
    }
    if ($this->data['getById'][0]['descriptionProject']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Présentation du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Présentation du projet"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['descriptionProject'])));
      $pdf->Ln();
    }
    $i = 0;
    $j = 0;
    if (is_array($this->data['getById'][0]['filesProject']) && $i < count($this->data['getById'][0]['filesProject'])) {
      $pdf->Content("Fichier joins : ");
      while (is_array($this->data['getById'][0]['filesProject']) &&  $i < count($this->data['getById'][0]['filesProject'])) {
        if ($this->data['getById'][0]['filesProject'][$i]['tag'] == "projectFile") {
          $pdf->Content(" " . $security->html(utf8_decode($this->data['getById'][0]['filesProject'][$i]['name'])));
          $j++;
        }
        $i++;
      }
      if ($j > 0) {
        $pdf->Ln();
      }
    }
    else {
      $pdf->Content("fichiers joins : Aucun");
    }

    if ($this->data['getById'][0]['usersProject']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Utilisateur du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Utilisateur du projet"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['usersProject']))); 
    }
    if ($this->data['getById'][0]['language']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Langue"),false);
      $pdf->Cell(0,6,utf8_decode("Langue"),0,1);
      $pdf->Ln();
      $pdf->Content("Langue de l'application : " . $security->html(utf8_decode($this->data['getById'][0]['language'])));
      if ($this->data['getById'][0]['language'] == "multiple") {
        $pdf->Ln();
        $pdf->SetFont('Arial','B',12);
        $pdf->Bookmark(utf8_decode("Liste des langues de l'application"),false);
        $pdf->Cell(0,6,utf8_decode("Liste des langues de l'application"),0,1);
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['multiLanguage'])));
        $pdf->Ln();
        $pdf->SetFont('Arial','B',12);
        $pdf->Bookmark(utf8_decode("Moyen de traduction"),false);
        $pdf->Cell(0,6,utf8_decode("Moyen de traduction"),0,1);
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['traduction'])));
        $pdf->Ln();
      }
    }
    if ($this->data['getById'][0]['stat']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Statistiques de fréquentation / Suivi utilisateur"),false);
      $pdf->Cell(0,6,utf8_decode("Statistiques de fréquentation / Suivi utilisateur"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['stat']))); 
    }
    if ($this->data['getById'][0]['maintenance']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Suivi de l'application"),false);
      $pdf->Cell(0,6,utf8_decode("Suivi de l'application"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['maintenance']))); 
    }
 
    if (is_array($this->data['getById'][0]['fonctionnalityProject']) && count($this->data['getById'][0]['fonctionnalityProject']) > 0) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Fonctionnalitées principal du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Fonctionnalitées principal du projet"),0,1);
      $pdf->Ln();
      $i = 0;
      while (s_array($this->data['getById'][0]['fonctionnalityProject']) && $i < count($this->data['getById'][0]['fonctionnalityProject'])) {
        $pdf->SetFont('Arial','B',12);
        $pdf->Bookmark($security->html(utf8_decode($this->data['getById'][0]['fonctionnalityProject'][$i]['name'])),false);
        $pdf->Cell(0,6,$security->html(utf8_decode($this->data['getById'][0]['fonctionnalityProject'][$i]['name'])),0,1);
        $pdf->Ln();
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['fonctionnalityProject'][$i]['description'])));
        $pdf->Ln(); 
        $i++;
      }
    }

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Bookmark(utf8_decode("Templating"),false);
    $pdf->Cell(0,6,utf8_decode("Templating"),0,1);
    $pdf->Ln();

    $pdf->Content("Design existant : " . $security->html(utf8_decode($this->data['getById'][0]['designBool'])));
    $pdf->Ln();
    $pdf->Content("Information : " . $security->html(utf8_decode($this->data['getById'][0]['infoDesign'])));

    $i = 0;
    $j = 0;
    if (is_array($this->data['getById'][0]['filesProject']) && $i < count($this->data['getById'][0]['filesProject'])) {
      $pdf->Content("Fichier joins : ");
      $pdf->Ln();
      while (is_array($this->data['getById'][0]['filesProject']) && $i < count($this->data['getById'][0]['filesProject'])) {
        if ($this->data['getById'][0]['filesProject'][$i]['tag'] == "designFile") {
          $pdf->Content(" " . $security->html(utf8_decode($this->data['getById'][0]['filesProject'][$i]['name'])));
          $j++;
        }
        $i++;
      }
      if ($j > 0) {
        $pdf->Ln();
      }
    }
    else {
      $pdf->Content("fichiers joins : Aucun");
    }

    if (count($this->data['getById'][0]['pageProject'])) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark($security->html(utf8_decode("Page")),false);
      $pdf->Cell(0,6,$security->html(utf8_decode("Page")),0,1);
      $pdf->Ln();
      
      $i = 0;
      while (is_array($this->data['getById'][0]['pageProject']) && $i < count($this->data['getById'][0]['pageProject'])) {
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Bookmark($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["namePage"])),false);
        $pdf->Cell(0,6,$security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["namePage"])),0,1);   
        $pdf->Ln();
        $pdf->Content("Description : ");
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["descriptionPage"])));
        $pdf->Ln();
        $pdf->Content("Contenu static page : ");
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["contentStaticPage"])));
        $pdf->Ln(); 
        $pdf->Content("Contenu dynamic page : ");
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["contentDynamicPage"])));
        $pdf->Ln();

        $j = 0;
        if (is_array($this->data['getById'][0]['pageProject'][$i]["filePage"]) && $j < count($this->data['getById'][0]['pageProject'][$i]["filePage"])) {
          $pdf->Ln();
          $pdf->Content("Fichier joins : ");
          while (is_array($this->data['getById'][0]['pageProject'][$i]["filePage"]) && $j < count($this->data['getById'][0]['pageProject'][$i]["filePage"])) {
            $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["filePage"][$j]['name'])));
            $j++;
          }
          if ($j > 0) {
            $pdf->Ln();
          }
        }
        else {
          $pdf->Content("fichiers joins : Aucun");
          $pdf->Ln();
        }

        $j = 0;
        if (is_array($this->data['getById'][0]['pageProject'][$i]["fonctionnalityPage"]) && $j < count($this->data['getById'][0]['pageProject'][$i]["fonctionnalityPage"])) {
          $pdf->SetFont('Arial','B',12);
          $pdf->Bookmark(utf8_decode("Fonctionnalité de la page"),false);
          $pdf->Cell(0,6,utf8_decode("Fonctionnalité de la page"),0,1); 
          $pdf->Ln();
          while (is_array($this->data['getById'][0]['pageProject'][$i]["fonctionnalityPage"]) && $j < count($this->data['getById'][0]['pageProject'][$i]["fonctionnalityPage"])) {
            $pdf->Content("Nom : " . $security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["fonctionnalityPage"][$j]['name'])));
            $pdf->Content("Description :");
            $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["fonctionnalityPage"][$j]['description'])));
            $pdf->Ln();                
            $j++;
          }
        }
        $i++;
      }

    }

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Bookmark(utf8_decode("Environnement technique"),false);
    $pdf->Cell(0,6,utf8_decode("Environnement technique"),0,1);
    $pdf->Ln();

    if ($this->data['getById'][0]['nameField']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Nom de domaine"),false);
      $pdf->Cell(0,6,utf8_decode("Nom de domaine"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['nameField'])));
      $pdf->Ln();
    }
    if ($this->data['getById'][0]['accomodation']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Information sur l'hebergeurs"),false);
      $pdf->Cell(0,6,utf8_decode("Information sur l'hebergeurs"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['accomodation'])));
      $pdf->Ln();
    }
    if ($this->data['getById'][0]['security']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Information sur la sécurité"),false);
      $pdf->Cell(0,6,utf8_decode("Information sur la sécurité"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['security'])));
      $pdf->Ln();
    }
    if ($this->data['getById'][0]['technology']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Techonologie"),false);
      $pdf->Cell(0,6,utf8_decode("Techonologie"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['technology'])));
      $pdf->Ln();
    }
    if ($this->data['getById'][0]['bdd']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Base de données"),false);
      $pdf->Cell(0,6,utf8_decode("Base de données"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['bdd'])));
      $pdf->Ln();
    }

    //Index
    $pdf->AddPage();
    $pdf->Bookmark('Index',false);
    $pdf->CreateIndex();

    $root = ROOT . '/webroot/pdf/';
    $nameFile = 'ch' . $this->data['getById'][0]['id'] . '.pdf';
    $ret = $pdf->Output($root . $nameFile,'F');

    $data = array();
    $data['name'] = $nameFile;
    $data['location'] = $root;
    $data['type'] = 'pdf';
    $data['tag'] = 'pdf';
    $data['parentTable'] = 'projectCh';
    $data['id_parent'] = $this->data['getById'][0]['id'];
    $fileManager = new Files_manager();
    $ret = $fileManager->insert($data);
    if ($ret) {
      return ($nameFile);
      die();
    }
    return (NULL);
  }

  public function setProposition()
  {
    $security = new security();
    $verificator = new verificator();

    $postMaxSize = $security->postMaxSize();
    if ($postMaxSize) {
      $ret = ['error' => true, 'dataError' => ['status' => 103, 'message' => "Post content size to large"]];
      header('Content-type: text/plain');
      echo json_encode($ret);
      die();
    }

    $project = array();
    $project["name"] = $security->bdd($_POST["name"]);
    $project["firstname"] = $security->bdd($_POST["firstname"]);
    $project["country"] = $security->bdd($_POST["country"]);
    $project["adress"] = $security->bdd($_POST["adress"]);
    $project["cp"] = $security->bdd($_POST["cp"]);
    $project["lat"] = $security->bdd($_POST["lat"]);
    $project["lng"] = $security->bdd($_POST["lng"]);
    $project["statusLegal"] = $security->bdd($_POST["statusLegal"]);
    $project["denomination"] = $security->bdd($_POST["denomination"]);
    $project["presentation"] = $security->bdd($_POST["presentation"]);
    $project["typeApp"] = $security->bdd($_POST["typeApp"]);
    $project["contextProject"] = $security->bdd($_POST["contextProject"]);
    $project["objectifProject"] = $security->bdd($_POST["objectifProject"]);
    $project["constraintProject"] = $security->bdd($_POST["constraintProject"]);
    $project["usersProject"] = $security->bdd($_POST["usersProject"]);
    $project["descriptionProject"] = $security->bdd($_POST["descriptionProject"]);
    $project["language"] = $security->bdd($_POST["language"]);
    $project["multiLanguage"] = $security->bdd($_POST["multiLanguage"]);
    $project["traduction"] = $security->bdd($_POST["traduction"]);
    $project["stat"] = $security->bdd($_POST["stat"]);
    $project["dateEndProjectBool"] = $security->bdd($_POST["dateEndProjectBool"]);
    $project["dateEndProject"] = $security->bdd($_POST["dateEndProject"]);
    $project["maintenance"] = $security->bdd($_POST["maintenance"]);
    $project["nameField"] = $security->bdd($_POST["nameField"]);
    $project["accomodation"] = $security->bdd($_POST["accomodation"]);
    $project["security"] = $security->bdd($_POST["security"]);
    $project["technology"] = $security->bdd($_POST["technology"]);
    $project["bdd"] = $security->bdd($_POST["bdd"]);
    $project["designBool"] = $security->bdd($_POST["designBool"]);
    $project["infoDesign"] = $security->bdd($_POST["infoDesign"]);
    $project["budget"] = $security->bdd($_POST["budget"]);
    $project["billing"] = $security->bdd($_POST["billing"]);
    $project["answer"] = $security->bdd($_POST["answer"]);
    $project["email"] = $security->bdd($_POST["email"]);
    $project["tel"] = $security->bdd($_POST["tel"]);
    $project["preference_answer"] = $security->bdd($_POST["preference_answer"]);
    $project["start_preference_answer"] = $security->bdd($_POST["start_preference_answer"]);
    $project["end_preference_answer"] = $security->bdd($_POST["end_preference_answer"]);
    $project["quotation"] = $security->bdd($_POST["quotation"]);
    $project["registration"] = $security->bdd($_POST["registration"]);
    $project["upgrade"] = $security->bdd($_POST["upgrade"]);

    $errorMsg = array();
    if(!isset($_POST["name"]) || $_POST["name"]==""){
        $errorMsg[] = "Your 'Name' is required";
    }
    if(!isset($_POST["firstname"]) || $_POST["firstname"]==""){
      $errorMsg[] = "Your 'Firstname' is required";
    }
    if(!isset($_POST["country"]) || $_POST["country"]==""){
      $errorMsg[] = "Your 'Country' is required";
    }
    if(!isset($_POST["adress"]) || $_POST["adress"]==""){
      $errorMsg[] = "Your 'Adress' is required";
    }
    if(!isset($_POST["cp"]) || $_POST["cp"]==""){
      $errorMsg[] = "Your 'Postal code' is required";
    }
    if(!isset($_POST["statusLegal"]) || $_POST["statusLegal"]==""){
      $errorMsg[] = "Your 'Legal status' is required";
    }
    if(!isset($_POST["denomination"]) || $_POST["denomination"]==""){
      $errorMsg[] = "Your 'Denomination' is required";
    }
    if(!isset($_POST["email"]) || $_POST["email"]==""){
      $errorMsg[] = "Your 'email' is required";
    }
    if(!isset($_POST["tel"]) || $_POST["tel"]==""){
      $errorMsg[] = "Your 'phone' is required";
    }

    $captcha = isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:null;
    $verifCaptcha = $verificator->checkCaptcha($captcha);

    if (!$verifCaptcha) {
      $errorMsg[] = "Captcha on error, apparently you are a robot";
    }

    if(count($errorMsg)>0) {
        $ret = ['error' => true, 'dataError' => ['status' => 103, 'message' => implode("<br/>", $errorMsg)]];
    }
    else {

      $projectManager = new projectCh_manager();
      $retInsertProject = $projectManager->insert($project);
    

      if ($retInsertProject) {

        $rootUpload = ROOT . '/webroot/upload';
        if(!is_dir($rootUpload)) {
          mkdir(($rootUpload), 0777, true);
        }

        $upload = new upload();
        $destination = $upload->nameDirUnknown($rootUpload . '/', 4);
        if(!is_dir($destination)) {
          mkdir(($destination), 0777, true);
        }
        $arrayExtension = ['jpg', 'jpeg', 'png', 'doc', 'docx', 'pdf'];

        $retUpload[] = $upload->uploadMultiple($_FILES, "denominationFile", $destination, 1000000000, $arrayExtension);
        $retUpload[] = $upload->uploadMultiple($_FILES, "projectFile", $destination, 1000000000, $arrayExtension);
        $retUpload[] = $upload->uploadMultiple($_FILES, "designFile", $destination, 1000000000, $arrayExtension);
        

        $files = new files_manager();
        $retInsertFiles = array();
        $i = 0;
        while ($i < count($retUpload)) {
          $j = 0;
          while ($j < count($retUpload[$i])) {
            if ($retUpload[$i][$j]['err'] == false) {
              $file = array();
              $file['name'] = $security->bdd($retUpload[$i][$j]['file']);
              $file['location'] = $security->bdd($retUpload[$i][$j]['destination']);
              $file['type'] = $security->bdd($retUpload[$i][$j]['ext']);
              $file['tag'] = $security->bdd($retUpload[$i][$j]['nameInput']);
              $file['parentTable'] = 'projectCh';
              $file['id_parent'] = $retInsertProject;
              $retInsertFile['retUpload'] = $retUpload[$i][$j];
              $retInsertFile['retInsertFile'] = $files->insert($file);
              $retInsertFiles[] = $retInsertFile;
            }
            else {
              $retInsertFile['retUpload'] = $retUpload[$i][$j];
              $retInsertFile['retInsertFile'] = false;
              $retInsertFiles[] = $retInsertFile;
            }
            $j++;
          }
          $i++;
        }

        $functionnality_manager = new FunctionnalityProjectCh_manager();
        $nameFunctionnality = isset($_POST['nameFunctionnality'])?$_POST['nameFunctionnality']:null;
        $descriptionFunctionnality = isset($_POST['descriptionFunctionnality'])?$_POST['descriptionFunctionnality']:null;
        $retInsertFunctionnalitys = array();
        if(isset($nameFunctionnality) || $nameFunctionnality != "" || isset($descriptionFunctionnality) || $descriptionFunctionnality){
          if (count($nameFunctionnality) == count($descriptionFunctionnality)) {
            $i = 0;
            while ($i < count($nameFunctionnality)) {
              $functionnality = array();
              $functionnality['name'] = $security->bdd($nameFunctionnality[$i]);
              $functionnality['description'] = $security->bdd($descriptionFunctionnality[$i]);
              $functionnality['parentTable'] = 'projectCh';
              $functionnality['id_parent'] = $retInsertProject;
              $retInsertFunctionnality = array();
              $retInsertFunctionnality['nbPost'] = $i;
              $retInsertFunctionnality['retInsertFunctionnality'] = $functionnality_manager->insert($functionnality);
              $retInsertFunctionnalitys[] = $retInsertFunctionnality;
              $i++;
            }
          }
        }

        $pageProjectCh_manager = new PageProjectCh_manager();
        $namePage = isset($_POST['namePage'])?$_POST['namePage']:null;
        $descriptionPage = isset($_POST['descriptionPage'])?$_POST['descriptionPage']:null;
        $contentStaticPage = isset($_POST['contentStaticPage'])?$_POST['contentStaticPage']:null;
        $contentDynamicPage = isset($_POST['contentDynamicPage'])?$_POST['contentDynamicPage']:null;
        $retInsertPages = array();
        if(isset($namePage) || $namePage != "" || isset($descriptionPage) || $descriptionPage != "" || isset($contentStaticPage) || $contentStaticPage != "" || isset($contentDynamicPage) || $contentDynamicPage != "") {
          if (count($namePage) == count($descriptionPage) && count($namePage) == count($contentStaticPage) && count($namePage) == count($contentDynamicPage)) {
            $i = 0;
            while ($i < count($namePage)) {  
              $page = array();
              $retInsertPage = array();
              $page['namePage'] = $security->bdd($namePage[$i]);
              $page['descriptionPage'] = $security->bdd($descriptionPage[$i]);
              $page['contentStaticPage'] = $security->bdd($contentStaticPage[$i]);
              $page['contentDynamicPage'] = $security->bdd($contentDynamicPage[$i]);
              $page['id_parent'] = $retInsertProject;
              $retInsertPage['nPage'] = $i;
              $retInsertPage['retInsertPage'] = $pageProjectCh_manager->insert($page);

              $filePage = $upload->returnFileMultiple($_FILES['filePage'], "filePage", $i);
              $retUploadPage = $upload->uploadMultiple($filePage, "filePage", $destination, 1000000000000, $arrayExtension);
              $retUpload[] = $retUploadPage;

              $j = 0;
              while ($j < count($retUploadPage)) {
                if ($retUploadPage[$j]['err'] == false) {
                  $file['name'] = $retUploadPage[$j]['file'];
                  $file['location'] = $retUploadPage[$j]['destination'];
                  $file['type'] = $retUploadPage[$j]['ext'];
                  $file['tag'] = $retUploadPage[$j]['nameInput'];
                  $file['parentTable'] = 'pageProjectCh';
                  $file['id_parent'] = $retInsertPage['retInsertPage'];
                  $retInsertFilePage['retUpload'] = $retUploadPage[$j];
                  $retInsertFilePage['retInsertFile'] = $files->insert($file);
                  $retInsertFilesPage[] = $retInsertFilePage;
                }
                else {
                  $retInsertFilePage['retUpload'] = $retUploadPage[$j];
                  $retInsertFilePage['retInsertFile'] = false;
                  $retInsertFilesPage[] = $retInsertFilePage;
                }
                $j++;
              }

              $nameFunctionnalityPage = isset($_POST['nameFunctionnalityPage'])?$_POST['nameFunctionnalityPage']:null;
              $descriptionFunctionnalityPage = isset($_POST['descriptionFunctionnalityPage'])?$_POST['descriptionFunctionnalityPage']:null;
              $retInsertFunctionnalitysPage = array();
              if (is_array($nameFunctionnalityPage) && count($nameFunctionnalityPage) > $i) {  
                if(isset($nameFunctionnalityPage[$i]) || $nameFunctionnalityPage[$i] != "" || isset($descriptionFunctionnalityPage[$i]) || $descriptionFunctionnalityPage[$i]){
                  if (count($nameFunctionnalityPage[$i]) == count($descriptionFunctionnalityPage[$i])) {
                    $j = 0;
                    while ($j < count($nameFunctionnalityPage[$i])) {
                      $functionnality = array();
                      $functionnality['name'] = $security->bdd($nameFunctionnalityPage[$i][$j]);
                      $functionnality['description'] = $security->bdd($descriptionFunctionnalityPage[$i][$j]);
                      $functionnality['parentTable'] = 'pageProjectCh';
                      $functionnality['id_parent'] = $retInsertPage['retInsertPage'];
                      $retInsertFunctionnalityPage['nbPage'] = $j;
                      $retInsertFunctionnalityPage['retInsertFunctionnalityPage'] = $functionnality_manager->insert($functionnality);
                      $retInsertFunctionnalitysPage[] = $retInsertFunctionnalityPage;
                      $j++;
                    }
                  }
                }
              }
              $retInsertPage['FunctionnalityPage'] = $retInsertFunctionnalitysPage;
              $retInsertPage['filesPage'] = $retInsertFilesPage; 
              $retInsertPages[] = $retInsertPage;
              $i++;
            }
          }
        } 
                
        $namePdf = $this->generatePdf($retInsertProject);
        
        $myEmail = new myemail();
        $emailSend = NULL;
        $files = array();
        
        if ($namePdf) {
          $file= array(
            "name" => $namePdf,
            "root" => ROOT . '/webroot/pdf/',
          );
          $files[] = $file;
          $emailSend = $myEmail->emailAttachment("Proposition send on marceaulenoir.fr", "A proposal was sent from the site www.marceaulenoir.fr \n id post = " . $retInsertProject . "\n file name = " . $namePdf . "\n", "mlcvcard@gmail.com", "marceau.lenoir@gmail.com", $files);
        }
        else {
          $emailSend = $myEmail->emailSimpl("Proposition send on marceaulenoir.fr", "A proposal was sent from the site www.marceaulenoir.fr \n id post = " . $retInsertProject . "\n file name = No file generate \n", "", "mlcvcard@gmail.com", "marceau.lenoir@gmail.com");
        }

        $zip = new ZipArchive();
        $zipArchive = false;
        if($zip->open(ROOT . '/webroot/archive/' . $retInsertProject . '.zip', ZIPARCHIVE::OVERWRITE | ZIPARCHIVE::CREATE) !== true) {
          $zipArchive = false;
        }
        else {
          foreach($retUpload as $files) {
            foreach($files as $file) {
              if ($file['err'] == false) {
                $zip->addFile($file['destination'] . $file['file'],$file['file']);
              }
            }
          }
          $zip->addFile(ROOT . '/webroot/pdf/' . $namePdf);
          $zip->close();
          $zipArchive = true;
        }


        $data = array(
          "retInsertProject" => $retInsertProject,
          "retInsertFilesProject" => $retInsertFiles,
          "retInsertFunctionnalitysProject" => $retInsertFunctionnalitys,
          "retInsertPages" => $retInsertPages,
          "retUpload" => $retUpload,
          "emailSend" => $emailSend,
          "namePdf" => ROOT . '/webroot/pdf/' . $namePdf,
          "zipArchive" => $zipArchive,

        );

        $ret = ['error' => false, 'response' => ['status' => 200, 'result' => $data]];
      }
      else {
        $ret = ['error' => true, 'dataError' => ['status' => 103, 'message' => $retInsertProject]];
      }

    }

    header('Content-type: application/json');
    echo json_encode($ret);
    die();
  }
  /*
  public function getPropositionById()
  {
    $project = new ProjectCh_manager();
    $this->data['getById'] = $project->getById(4);

    $security = new security();
    $pdf = new fpdfch();
    
    $pdf->AddPage();
    $pdf->FirstPage();

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Bookmark ('Information Personnel',false);
    $pdf->Cell(0,6,'Information Personnel',0,1);
    $pdf->Ln();

    $pdf->Content('Nom : ' . $security->html(utf8_decode($this->data['getById'][0]['name'])));
    $pdf->Content('Prenom : ' . $security->html(utf8_decode($this->data['getById'][0]['firstname'])));
    $pdf->Content('Adresse : ' . $security->html(utf8_decode($this->data['getById'][0]['adress'])));
    $pdf->Content('Code postal : ' . $security->html(utf8_decode($this->data['getById'][0]['cp'])));
    $pdf->Content('Pays : ' . $security->html(utf8_decode($this->data['getById'][0]['country'])));

    $pdf->Ln();

    $pdf->Content('lat : ' . $security->html(utf8_decode($this->data['getById'][0]['lat'])));
    $pdf->Content('lng : ' . $security->html(utf8_decode($this->data['getById'][0]['lng'])));
    
    $pdf->Ln();

    $pdf->Content('Email : ' . $security->html(utf8_decode($this->data['getById'][0]['email'])));
    $pdf->Content('Tel : ' . $security->html(utf8_decode($this->data['getById'][0]['tel'])));

    $pdf->Ln();

    $pdf->Content('Status legal : ' . $security->html(utf8_decode($this->data['getById'][0]['statusLegal'])));
    $pdf->Content('Denomination legal : ' . $security->html(utf8_decode($this->data['getById'][0]['denomination'])));

    $i = 0;
    $j = 0;
    if ($i < count($this->data['getById'][0]['filesProject'])) {
      $pdf->Ln();
      $pdf->Content("Fichier joins : ");
      while ($i < count($this->data['getById'][0]['filesProject'])) {
        if ($this->data['getById'][0]['filesProject'][$i]['tag'] == "denominationFile") {
          $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['filesProject'][$i]['name'])));
          $j++;
        }
        $i++;
      }
      if ($j > 0) {
        $pdf->Ln();
      }
    }

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Bookmark(utf8_decode("Reponse"),false);
    $pdf->Cell(0,6,utf8_decode("Reponse"),0,1);
    $pdf->Ln();

    $pdf->Content(utf8_decode('Moyen de réponse préféré: ') . $security->html(utf8_decode($this->data['getById'][0]['preference_answer'])));
    $pdf->Content(utf8_decode('Horraire de réponse préféré : De ') . $security->html(utf8_decode($this->data['getById'][0]['start_preference_answer'])) . utf8_decode(" à ") . $security->html(utf8_decode($this->data['getById'][0]['end_preference_answer'])));
    $pdf->Content(utf8_decode('Demande de devis : ') . $security->html(utf8_decode($this->data['getById'][0]['quotation'])));
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Bookmark(utf8_decode("Reponse attendu"),false);
    $pdf->Cell(0,6,utf8_decode("Reponse attendu"),0,1);
    $pdf->Ln();
    $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['answer'])));
    $pdf->Ln();

    if ($this->data['getById'][0]['presentation']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Présentation de l'entreprise"),false);
      $pdf->Cell(0,6,utf8_decode("Présentation de l'entreprise"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['presentation']))); 
    }

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Bookmark(utf8_decode("Description du projet"),false);
    $pdf->Cell(0,6,utf8_decode("Description du projet"),0,1);
    $pdf->Ln();

    if ($this->data['getById'][0]['contextProject']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Contexte du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Contexte du projet"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['contextProject']))); 
    }
    if ($this->data['getById'][0]['objectifProject']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Objectif du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Objectif du projet"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['objectifProject']))); 
    }
    if ($this->data['getById'][0]['constraintProject']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Contraintes du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Contraintes du projet"),0,1);
      $pdf->Ln();
      if ($this->data['getById'][0]['dateEndProjectBool']) {
        $pdf->Content(utf8_decode("Date maximum de fin de réalisation : ") . $security->html(utf8_decode($this->data['getById'][0]['dateEndProject']))); 
        $pdf->Ln();
      }
      else {
        $pdf->Content(utf8_decode("Date maximum de fin de réalisation : Non défini ")); 
        $pdf->Ln();
      }
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['constraintProject']))); 
    }
    if ($this->data['getById'][0]['typeApp']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Type d'application cible"),false);
      $pdf->Cell(0,6,utf8_decode("Type d'application cible"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['typeApp'])));
      $pdf->Ln();
    }
    if ($this->data['getById'][0]['descriptionProject']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Présentation du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Présentation du projet"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['descriptionProject'])));
      $pdf->Ln();
    }
    $i = 0;
    $j = 0;
    if ($i < count($this->data['getById'][0]['filesProject'])) {
      $pdf->Content("Fichier joins : ");
      while ($i < count($this->data['getById'][0]['filesProject'])) {
        if ($this->data['getById'][0]['filesProject'][$i]['tag'] == "projectFile") {
          $pdf->Content(" " . $security->html(utf8_decode($this->data['getById'][0]['filesProject'][$i]['name'])));
          $j++;
        }
        $i++;
      }
      if ($j > 0) {
        $pdf->Ln();
      }
    }
    else {
      $pdf->Content("fichiers joins : Aucun");
    }

    if ($this->data['getById'][0]['usersProject']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Utilisateur du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Utilisateur du projet"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['usersProject']))); 
    }
    if ($this->data['getById'][0]['language']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Langue"),false);
      $pdf->Cell(0,6,utf8_decode("Langue"),0,1);
      $pdf->Ln();
      $pdf->Content("Langue de l'application : " . $security->html(utf8_decode($this->data['getById'][0]['language'])));
      if ($this->data['getById'][0]['language'] == "multiple") {
        $pdf->Ln();
        $pdf->SetFont('Arial','B',12);
        $pdf->Bookmark(utf8_decode("Liste des langues de l'application"),false);
        $pdf->Cell(0,6,utf8_decode("Liste des langues de l'application"),0,1);
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['multiLanguage'])));
        $pdf->Ln();
        $pdf->SetFont('Arial','B',12);
        $pdf->Bookmark(utf8_decode("Moyen de traduction"),false);
        $pdf->Cell(0,6,utf8_decode("Moyen de traduction"),0,1);
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['traduction'])));
        $pdf->Ln();
      }
    }
    if ($this->data['getById'][0]['stat']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Statistiques de fréquentation / Suivi utilisateur"),false);
      $pdf->Cell(0,6,utf8_decode("Statistiques de fréquentation / Suivi utilisateur"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['stat']))); 
    }
    if ($this->data['getById'][0]['maintenance']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Suivi de l'application"),false);
      $pdf->Cell(0,6,utf8_decode("Suivi de l'application"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['maintenance']))); 
    }
 
    if (count($this->data['getById'][0]['fonctionnalityProject']) > 0) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Fonctionnalitées principal du projet"),false);
      $pdf->Cell(0,6,utf8_decode("Fonctionnalitées principal du projet"),0,1);
      $pdf->Ln();
      $i = 0;
      while ($i < count($this->data['getById'][0]['fonctionnalityProject'])) {
        $pdf->SetFont('Arial','B',12);
        $pdf->Bookmark($security->html(utf8_decode($this->data['getById'][0]['fonctionnalityProject'][$i]['name'])),false);
        $pdf->Cell(0,6,$security->html(utf8_decode($this->data['getById'][0]['fonctionnalityProject'][$i]['name'])),0,1);
        $pdf->Ln();
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['fonctionnalityProject'][$i]['description'])));
        $pdf->Ln(); 
        $i++;
      }
    }

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Bookmark(utf8_decode("Templating"),false);
    $pdf->Cell(0,6,utf8_decode("Templating"),0,1);
    $pdf->Ln();

    $pdf->Content("Design existant : " . $security->html(utf8_decode($this->data['getById'][0]['designBool'])));
    $pdf->Ln();
    $pdf->Content("Information : " . $security->html(utf8_decode($this->data['getById'][0]['infoDesign'])));

    $i = 0;
    $j = 0;
    if ($i < count($this->data['getById'][0]['filesProject'])) {
      $pdf->Content("Fichier joins : ");
      $pdf->Ln();
      while ($i < count($this->data['getById'][0]['filesProject'])) {
        if ($this->data['getById'][0]['filesProject'][$i]['tag'] == "designFile") {
          $pdf->Content(" " . $security->html(utf8_decode($this->data['getById'][0]['filesProject'][$i]['name'])));
          $j++;
        }
        $i++;
      }
      if ($j > 0) {
        $pdf->Ln();
      }
    }
    else {
      $pdf->Content("fichiers joins : Aucun");
    }

    if (count($this->data['getById'][0]['pageProject'])) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark($security->html(utf8_decode("Page")),false);
      $pdf->Cell(0,6,$security->html(utf8_decode("Page")),0,1);
      $pdf->Ln();
      
      $i = 0;
      while ($i < count($this->data['getById'][0]['pageProject'])) {
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Bookmark($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["namePage"])),false);
        $pdf->Cell(0,6,$security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["namePage"])),0,1);   
        $pdf->Ln();
        $pdf->Content("Description : ");
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["descriptionPage"])));
        $pdf->Ln();
        $pdf->Content("Contenu static page : ");
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["contentStaticPage"])));
        $pdf->Ln(); 
        $pdf->Content("Contenu dynamic page : ");
        $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["contentDynamicPage"])));
        $pdf->Ln();

        $j = 0;
        if ($j < count($this->data['getById'][0]['pageProject'][$i]["filePage"])) {
          $pdf->Ln();
          $pdf->Content("Fichier joins : ");
          while ($j < count($this->data['getById'][0]['pageProject'][$i]["filePage"])) {
            $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["filePage"][$j]['name'])));
            $j++;
          }
          if ($j > 0) {
            $pdf->Ln();
          }
        }
        else {
          $pdf->Content("fichiers joins : Aucun");
          $pdf->Ln();
        }

        $j = 0;
        if ($j < count($this->data['getById'][0]['pageProject'][$i]["fonctionnalityPage"])) {
          $pdf->SetFont('Arial','B',12);
          $pdf->Bookmark(utf8_decode("Fonctionnalité de la page"),false);
          $pdf->Cell(0,6,utf8_decode("Fonctionnalité de la page"),0,1); 
          $pdf->Ln();
          while ($j < count($this->data['getById'][0]['pageProject'][$i]["fonctionnalityPage"])) {
            $pdf->Content("Nom : " . $security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["fonctionnalityPage"][$j]['name'])));
            $pdf->Content("Description :");
            $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['pageProject'][$i]["fonctionnalityPage"][$j]['description'])));
            $pdf->Ln();                
            $j++;
          }
        }
        $i++;
      }

    }

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Bookmark(utf8_decode("Environnement technique"),false);
    $pdf->Cell(0,6,utf8_decode("Environnement technique"),0,1);
    $pdf->Ln();

    if ($this->data['getById'][0]['nameField']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Nom de domaine"),false);
      $pdf->Cell(0,6,utf8_decode("Nom de domaine"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['nameField'])));
      $pdf->Ln();
    }
    if ($this->data['getById'][0]['accomodation']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Information sur l'hebergeurs"),false);
      $pdf->Cell(0,6,utf8_decode("Information sur l'hebergeurs"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['accomodation'])));
      $pdf->Ln();
    }
    if ($this->data['getById'][0]['security']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Information sur la sécurité"),false);
      $pdf->Cell(0,6,utf8_decode("Information sur la sécurité"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['security'])));
      $pdf->Ln();
    }
    if ($this->data['getById'][0]['technology']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Techonologie"),false);
      $pdf->Cell(0,6,utf8_decode("Techonologie"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['technology'])));
      $pdf->Ln();
    }
    if ($this->data['getById'][0]['bdd']) {
      $pdf->AddPage();
      $pdf->SetFont('Arial','B',12);
      $pdf->Bookmark(utf8_decode("Base de données"),false);
      $pdf->Cell(0,6,utf8_decode("Base de données"),0,1);
      $pdf->Ln();
      $pdf->Content($security->html(utf8_decode($this->data['getById'][0]['bdd'])));
      $pdf->Ln();
    }

    //Index
    $pdf->AddPage();
    $pdf->Bookmark('Index',false);
    $pdf->CreateIndex();

    $root = ROOT . '/webroot/pdf/';
    $nameFile = 'ch' . $this->data['getById'][0]['id'] . '.pdf';
    $ret = $pdf->Output($root . $nameFile,'F');

    $data = array();
    $data['name'] = $nameFile;
    $data['location'] = $root;
    $data['type'] = 'pdf';
    $data['tag'] = '';
    $data['parentTable'] = 'projectCh';
    $data['id_parent'] = $this->data['getById'][0]['id'];
    $fileManager = new Files_manager();
    $ret = $fileManager->insert($data);
    $this->data['ret'] = $ret;
  }
  */
}

