<?php

//session_start();

require('../../plugins/fpdf/fpdf.php');

include "../../config/db.php";

$from = $_POST["from"];

$to   = $_POST["to"];

$category  = $_POST["category"];

$sumOfCottage=0;
$sumOfchild=0;
$sumOfadult=0;



$fill = true;



$pdf = new FPDF('L','mm','LETTER');

//$pdf = new FPDF();



//set left margin

$pdf->SetTitle('Monthly Report',true);

$pdf->AddPage();



//$pdf->Image('../../dist/img/download.png', 8, 5, 23, 23, 'PNG', '');

//title header

$pdf->SetFont('Arial','B',16);

//set position from left

$pdf->SetX(90);

$pdf->Cell(90,13,'Generate Report','','0','C');

$pdf->Ln();



$pdf->SetFont('Arial','B',10);

//set position from left

$pdf->SetX(90);

$pdf->Cell(85,0,'FROM: '.date("M d, Y", strtotime($from)).'  '.'TO: '.date("M d, Y", strtotime($to)),'','0','C');

$pdf->Ln();



$pdf->SetY(40);



//set margin left

$pdf->SetLeftMargin(20);



// Colors, line width and bold font

$pdf->SetFillColor(217, 217, 217);

$pdf->SetDrawColor(0);

$pdf->SetLineWidth(0);





if (isset($_POST["btnReport"])) {

		$sql = "SELECT
        reservation.id,
        reservation.trans_no,
        reservation.date_reserve,
        reservation.child,
        reservation.adult,
        reservation.check_in,
        reservation.check_out,
        reservation.`status`,
        reservation.`cottage/hall_id`,
        reservation.customer_id,
        reservation.date_created,
        reservation.downpayment,
        reservation.balance,
        `cottage/hall`.id,
        `cottage/hall`.img,
        `cottage/hall`.`name`,
        `cottage/hall`.type,
        `cottage/hall`.category,
        `cottage/hall`.max_person,
        `cottage/hall`.price as cottage_price,
        `user`.user_id,
        `user`.fname,
        `user`.lname,
        `user`.contact_no,
        `user`.address,
        `user`.uname,
        `user`.pass,
        `user`.user_type_id
        FROM
        reservation
        INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`
        INNER JOIN `user` ON `user`.user_id = reservation.customer_id        
        WHERE reservation.status = '$category' AND date_reserve BETWEEN '$from' AND '$to'";
		$query = $con->query($sql);

		if ($query->num_rows > 0) {

            
            $pdf->SetFont('Arial','B',10);

            $pdf->Cell(43,5,'Customer Name','1','0','L',$fill);

            $pdf->Cell(30,5,'Transaction no.','1','0','L',$fill);

            $pdf->Cell(40,5,'Date of Reservation','1','0','L',$fill);

            $pdf->Cell(33,5,'Cottage/hall Name','1','0','L',$fill);

            $pdf->Cell(25,5,'Child','1','0','l',$fill);

			$pdf->Cell(25,5,'Adult','1','0','l',$fill);

            $pdf->Cell(50,5,'Ammount','1','0','C',$fill);

            $pdf->Ln();


			while ($row = $query->fetch_assoc()) {
   
                $sumOfCottage += $row["cottage_price"]; //adding all price
				$sumOfchild += $row["child"];
				$sumOfadult += $row["adult"];
				$childAmmount = $sumOfchild * 25; //child price
				$adultAmmount = $sumOfadult * 50; //adult price
                $subTotal = $childAmmount + $adultAmmount + $sumOfCottage;



			//table row

			$pdf->SetFont('Arial','',10);

            $pdf->Cell(43,5,ucfirst($row['fname']).' '.ucfirst($row['lname']),'1','0','L');

            $pdf->Cell(30,5,$row['trans_no'],'1','0','L');

			$pdf->Cell(40,5,$row['date_reserve'],'1','0','L');

			$pdf->Cell(33,5,$row['name'],'1','0','L');

			$pdf->Cell(25,5,$row['child'],'1','0','l');

			$pdf->Cell(25,5,$row['adult'],'1','0','l');

			$pdf->Cell(50,5,number_format($row['cottage_price'],2),'1','0','R');

			$pdf->Ln();



			}

            //table row

			//$pdf->SetFont('Arial','',10);

			//$pdf->Cell(50,5,'','1','0','L');

			//$pdf->Cell(50,5,'','1','0','L');

			//$pdf->Cell(50,5,'Child ('.$child.'x 25):','1','0','R');

			//$pdf->Cell(50,5,number_format($childPrice,2),'1','0','R');

			//$pdf->Ln();

            //table row

			$pdf->SetFont('Arial','',10);

            $pdf->Cell(43,5,'','1','0','L');

            $pdf->Cell(30,5,'','1','0','L');

            $pdf->Cell(40,5,'','1','0','L');

			$pdf->Cell(33,5,'','1','0','L');

	

			$pdf->Cell(50,5,'Child ('.$sumOfchild.'x 25):','1','0','R');

			$pdf->Cell(50,5,number_format($childAmmount,2),'1','0','R');

			$pdf->Ln();

			//table row

            

			$pdf->SetFont('Arial','',10);

            $pdf->Cell(43,5,'','1','0','L');

			$pdf->Cell(30,5,'','1','0','L');

            $pdf->Cell(40,5,'','1','0','L');

			$pdf->Cell(33,5,'','1','0','L');

		

			$pdf->Cell(50,5,'Adult ('.$sumOfadult.'x 50):','1','0','R');

			$pdf->Cell(50,5,number_format($adultAmmount,2),'1','0','R');

			$pdf->Ln();

            //table row

			$pdf->SetFont('Arial','',10);

            $pdf->Cell(43,5,'','1','0','L');

			$pdf->Cell(30,5,'','1','0','L');

            $pdf->Cell(40,5,'','1','0','L');

			$pdf->Cell(33,5,'','1','0','L');

		

			$pdf->Cell(50,5,'Subtotal:','1','0','R');

			$pdf->Cell(50,5,number_format($subTotal,2),'1','0','R');

			$pdf->Ln();



		



            

		}else{

            //table row

			$pdf->SetFont('Arial','',10);

			$pdf->Cell(43,5,'','0','0','L');

			$pdf->Cell(40,5,'','0','0','L');

			$pdf->Cell(30,5,'','0','0','l');

			$pdf->Cell(25,5,'No Data','0','0','l');

            $pdf->Cell(25,5,'','0','0','l');

			$pdf->Cell(50,5,'','0','0','l');

			$pdf->Ln();

        }

		



   







}

$pdf->Output();

?>