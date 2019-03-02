<?php // Copyright (C) 2018 Vincent Breton - GPL3 ou +
class vb_carte_pdf {
	function vb_carte_pdf($firstname,$lastname,$indicatif,$datefin){ // Constructeur
	require_once TCPDF_PATH.'tcpdf.php';
	//require_once TCPDI_PATH.'tcpdi.php';
	$mypdf = new TCPDF('L','mm',array('85.6','53.9'),true,'UTF-8',false);
	$mypdf->SetCreator(PDF_CREATOR);
	$mypdf->SetAuthor('Généré par Dolibarr - module développé par Vincent Breton');
	$mypdf->SetTitle("Carte de membre de l'Association");
	$mypdf->SetSubject('Adhésion');
	$mypdf->SetKeywords('adhésion,association,carte,Dolibarr');
	$mypdf->SetPrintHeader(false);
	$mypdf->SetPrintFooter(false);
	$mypdf->SetAutoPageBreak('off',0);
	$mypdf->AddPage();
	$mypdf->RoundedRect(0,0,85.6,53.9,5,'1111','');
	$mypdf->SetImageScale(PDF_IMAGE_SCALE_RATIO);
	$mypdf->setJPEGQuality(75);
	$mypdf->setPageUnit('px');
	//$dimensions=$mypdf->getPageDimensions('');
	// 242.6x152.8
	//$mypdf->Write(0,$dimensions['w'],'',0,'C',true,0,false,false,0);	
	//$mypdf->Write(0,$dimensions['h'],'',0,'C',true,0,false,false,0);	
	$mypdf->Image('./images/electron.jpg',14.17,34,53,53,'JPG','http://www.presentiel.com','',true,150,'',false,false,0,false,false,false);
	$mypdf->setPageUnit('mm');
	$mypdf->SetXY(0,5);
	$html='<h3 style="font-size:18px;font-family:arial;text-align:center;line-height:0px;">Electronique L.A.</h3><h3 style="font-size:12px;text-align:center;">123 rue Tesla<br />44000 Nantes<h3>
<span style="color:#ADD8E6";>'.$firstname.'</span> <span style="color:#ADD8E6";>'.$lastname.'</span><br /><span style="color:#ADD8E6";>'.$indicatif.'</span>
<br /><br /><span style="font-size:15px;">Expire au:</span><span style="font-size:15px;font-family:courier;color:#B0B0B0;"> '.$datefin.'</span><br /><span style="font-family:arial;text-align:center;font-size:10px;">http://wwww.test.com - contact@test.com</span>';
	$mypdf->writeHTML($html, true, false, true, false, '');
	ob_clean();
	$mypdf->Output('carte_adherent_electron.pdf','I');
	}
}
?>

